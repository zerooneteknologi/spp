<?php

namespace App\Http\Controllers;

use App\Models\admin\School\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function index(): RedirectResponse
    {
        $schoolId = auth()->user()?->school_id;

        if (!$schoolId) {
            abort(404);
        }

        return redirect()->route('schools.edit', ['school' => $schoolId]);
    }

    public function create(): View
    {
        abort(404);
    }

    public function store(Request $request): RedirectResponse
    {
        abort(404);
    }

    public function show(School $school): View
    {
        $this->authorizeSchool($school);

        return view('admin.schools.show', compact('school'));
    }

    public function edit(School $school): View
    {
        $this->authorizeSchool($school);

        return view('admin.schools.edit', compact('school'));
    }

    public function update(Request $request, School $school): RedirectResponse
    {
        $this->authorizeSchool($school);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('schools', 'email')->ignore($school->id)],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        $school->update($validated);

        return redirect()->route('schools.index')->with('success', 'Data sekolah berhasil diperbarui.');
    }

    public function destroy(School $school): RedirectResponse
    {
        abort(404);
    }

    private function authorizeSchool(School $school): void
    {
        if ((int) auth()->user()->school_id !== (int) $school->id) {
            abort(403);
        }
    }
}
