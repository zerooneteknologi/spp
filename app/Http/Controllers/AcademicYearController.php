<?php

namespace App\Http\Controllers;

use App\Models\admin\AcademicYear\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AcademicYearController extends Controller
{
    public function index(): View
    {
        return view('admin.academic-years.index');
    }

    public function create(): View
    {
        return view('admin.academic-years.create');
    }

    public function edit(AcademicYear $academicYear): View
    {
        return view('admin.academic-years.edit', compact('academicYear'));
    }
}
