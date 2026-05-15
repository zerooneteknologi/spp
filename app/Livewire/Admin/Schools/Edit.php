<?php

namespace App\Livewire\Admin\Schools;

use App\Models\admin\School\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
  public School $school;
  public string $name = '';
  public string $email = '';
  public ?string $phone = null;
  public string $status = 'active';
  public ?string $address = null;

  protected function rules(): array
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('schools', 'email')->ignore($this->school->id)],
      'phone' => ['nullable', 'string', 'max:50'],
      'address' => ['nullable', 'string'],
      'status' => ['required', Rule::in(['active', 'inactive'])],
    ];
  }

  public function mount(School $school): void
  {
    $this->authorizeSchool($school);

    $this->school = $school;
    $this->name = $school->name;
    $this->email = $school->email;
    $this->phone = $school->phone;
    $this->status = $school->status ?? 'active';
    $this->address = $school->address;
  }

  public function save()
  {
    $validated = $this->validate();

    $this->school->update($validated);
    $this->school->refresh();

    session()->flash('success', 'Data sekolah berhasil diperbarui.');
  }

  private function authorizeSchool(School $school): void
  {
    if ((int) Auth::user()->school_id !== (int) $school->id) {
      abort(403);
    }
  }
}
