@extends('layouts.app')

@section('title', 'Edit Tahun Ajaran')

@section('content')
@livewire('admin.academic-years.edit', ['academicYear' => $academicYear])
@endsection
