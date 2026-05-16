<?php

namespace App\Livewire\Admin\AcademicYears;

use App\Models\admin\AcademicYear\AcademicYear;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public AcademicYear $academicYear;
    public $name = '';
    public $start_year = '';
    public $end_year = '';
    public $is_active = false;

    protected $rules = [
        'name' => 'required|string|max:50',
        'start_year' => 'required|integer',
        'end_year' => 'required|integer|gte:start_year',
        'is_active' => 'boolean',
    ];

    public function mount(AcademicYear $academicYear)
    {
        if ($academicYear->school_id !== Auth::user()->school_id) {
            abort(403);
        }

        $this->academicYear = $academicYear;
        $this->name = $academicYear->name;
        $this->start_year = $academicYear->start_year;
        $this->end_year = $academicYear->end_year;
        $this->is_active = $academicYear->is_active;
    }

    public function updatedStartYear($value)
    {
        if ($value) {
            $this->end_year = (int)$value + 1;
            $this->name = $value . '/' . $this->end_year;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->is_active && !$this->academicYear->is_active) {
            AcademicYear::where('school_id', Auth::user()->school_id)->update(['is_active' => false]);
        }

        $this->academicYear->update([
            'name' => $this->name,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'is_active' => $this->is_active,
        ]);

        session()->flash('success', 'Tahun ajaran berhasil diperbarui.');
        return $this->redirectRoute('academic-years.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.academic-years.edit');
    }
}
