<?php

namespace App\Livewire\Admin\Schools;

use App\Models\admin\School\School;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
  public School $school;

  public function mount(School $school): void
  {
    $this->authorizeSchool($school);

    $this->school = $school;
  }

  public function render()
  {
    return view('livewire.admin.schools.show');
  }

  private function authorizeSchool(School $school): void
  {
    if ((int) Auth::user()->school_id !== (int) $school->id) {
      abort(403);
    }
  }
}
