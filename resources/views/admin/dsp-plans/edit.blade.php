@extends('layouts.app')

@section('title', 'Edit Rencana DSP')

@section('content')
@livewire('admin.dsp-plans.edit', ['dspPlan' => $dspPlan])
@endsection
