@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
@livewire('admin.schools.edit', ['school' => $school])
@endsection