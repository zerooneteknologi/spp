<?php

namespace App\Http\Controllers;

use App\Models\admin\Dsp\DspPlan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DspPlanController extends Controller
{
    public function index(): View
    {
        return view('admin.dsp-plans.index');
    }

    public function create(): View
    {
        return view('admin.dsp-plans.create');
    }

    public function show(DspPlan $dspPlan): View
    {
        return view('admin.dsp-plans.show', compact('dspPlan'));
    }

    public function edit(DspPlan $dspPlan): View
    {
        return view('admin.dsp-plans.edit', compact('dspPlan'));
    }
}
