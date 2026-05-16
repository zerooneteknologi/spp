<?php

namespace App\Livewire\Admin\DspPlans;

use App\Models\admin\Dsp\DspPlan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function delete($id)
    {
        $plan = DspPlan::where('school_id', Auth::user()->school_id)->findOrFail($id);
        $plan->delete();
        session()->flash('success', 'DSP Plan berhasil dihapus.');
    }

    public function render()
    {
        $dspPlans = DspPlan::with('academicYear')->where('school_id', Auth::user()->school_id)->get();
        return view('livewire.admin.dsp-plans.index', compact('dspPlans'));
    }
}
