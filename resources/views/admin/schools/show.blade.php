@extends('layouts.app')

@section('title', 'Detail sekolah')

@section('content')
@livewire('admin.schools.show', ['school' => $school])
@endsection