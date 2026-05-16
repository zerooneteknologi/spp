<?php

namespace App\Livewire\Admin\DspPlans;

use App\Models\admin\AcademicYear\AcademicYear;
use App\Models\admin\Dsp\DspPlan;
use App\Models\admin\Dsp\DspInstallment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public DspPlan $dspPlan;
    public $academic_year_id = '';
    public $total_amount = '';
    public $installment_count = 1;
    public $installments = [];

    protected function rules()
    {
        return [
            'academic_year_id' => 'required|exists:academic_years,id',
            'total_amount' => 'required|numeric|min:1',
            'installment_count' => 'required|integer|min:1',
            'installments.*.amount' => 'required|numeric|min:0',
            'installments.*.due_date' => 'nullable|date',
        ];
    }

    public function mount(DspPlan $dspPlan)
    {
        if ($dspPlan->school_id !== Auth::user()->school_id) {
            abort(403);
        }

        $this->dspPlan = $dspPlan;
        $this->academic_year_id = $dspPlan->academic_year_id;
        $this->total_amount = number_format($dspPlan->total_amount, 0, '', '.');
        $this->installment_count = $dspPlan->installment_count;

        foreach ($dspPlan->installments as $installment) {
            $this->installments[] = [
                'id' => $installment->id,
                'amount' => number_format($installment->amount, 0, '', '.'),
                'due_date' => $installment->due_date ? \Carbon\Carbon::parse($installment->due_date)->format('Y-m-d') : null,
            ];
        }
    }

    public function generateInstallments()
    {
        $this->installments = [];
        $total = (float) str_replace('.', '', $this->total_amount);
        $count = (int) $this->installment_count;

        if ($total > 0 && $count > 0) {
            $baseAmount = floor(($total / $count) / 1000) * 1000;
            if ($baseAmount == 0) {
                $baseAmount = floor($total / $count);
            }
            $remainder = $total - ($baseAmount * $count);
            
            for ($i = 0; $i < $count; $i++) {
                // Sisa bagi masuk ke record terakhir
                $amt = $i === ($count - 1) ? $baseAmount + $remainder : $baseAmount;
                $this->installments[] = [
                    'amount' => number_format($amt, 0, '', '.'),
                    'due_date' => null
                ];
            }
        }
    }

    public function updatedTotalAmount()
    {
        $this->generateInstallments();
    }

    public function updatedInstallmentCount()
    {
        $this->generateInstallments();
    }

    public function save()
    {
        $this->resetErrorBag();
        
        $totalClean = (float) str_replace('.', '', $this->total_amount);

        // Manual validation
        $request = [
            'academic_year_id' => $this->academic_year_id,
            'total_amount' => $totalClean,
            'installment_count' => $this->installment_count,
        ];
        
        $validator = \Illuminate\Support\Facades\Validator::make($request, [
            'academic_year_id' => 'required|exists:academic_years,id',
            'total_amount' => 'required|numeric|min:1',
            'installment_count' => 'required|integer|min:1|max:24',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->messages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            return;
        }

        $sum = 0;
        $cleanInstallments = [];
        foreach ($this->installments as $index => $inst) {
            $amtClean = (float) str_replace('.', '', $inst['amount']);
            if ($amtClean < 0) {
                $this->addError('installments.'.$index.'.amount', 'Nominal tidak boleh negatif.');
                return;
            }
            $sum += $amtClean;
            $cleanInstallments[] = [
                'amount' => $amtClean,
                'due_date' => !empty($inst['due_date']) ? $inst['due_date'] : null,
            ];
        }

        if ($sum != $totalClean) {
            $this->addError('total_amount', 'Total cicilan (' . number_format($sum, 0, '', '.') . ') tidak sama dengan Total Biaya DSP.');
            return;
        }

        $this->dspPlan->update([
            'academic_year_id' => $this->academic_year_id,
            'total_amount' => $totalClean,
            'installment_count' => $this->installment_count,
        ]);

        $this->dspPlan->installments()->delete();

        foreach ($cleanInstallments as $index => $installment) {
            DspInstallment::create([
                'dsp_plan_id' => $this->dspPlan->id,
                'installment_number' => $index + 1,
                'amount' => $installment['amount'],
                'due_date' => $installment['due_date'],
            ]);
        }

        session()->flash('success', 'DSP Plan berhasil diperbarui.');
        return $this->redirectRoute('dsp-plans.index', navigate: true);
    }

    public function render()
    {
        $academicYears = AcademicYear::where('school_id', Auth::user()->school_id)->get();
        return view('livewire.admin.dsp-plans.edit', compact('academicYears'));
    }
}
