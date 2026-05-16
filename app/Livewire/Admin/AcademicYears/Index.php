<?php

namespace App\Livewire\Admin\AcademicYears;

use App\Models\admin\AcademicYear\AcademicYear;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function delete($id)
    {
        $academicYear = AcademicYear::where('school_id', Auth::user()->school_id)->findOrFail($id);
        $academicYear->delete();
        session()->flash('success', 'Tahun ajaran berhasil dihapus.');
    }

    public function render()
    {
        $academicYears = AcademicYear::where('school_id', Auth::user()->school_id)
            ->orderBy('start_year', 'desc')
            ->get();

        return view('livewire.admin.academic-years.index', compact('academicYears'));
    }
}
