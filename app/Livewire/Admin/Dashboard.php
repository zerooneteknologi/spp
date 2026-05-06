<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $school = auth()->user()?->school;
        $profileIncomplete = $school && (empty($school->phone) || empty($school->address));

        return view('livewire.admin.dashboard', compact('school', 'profileIncomplete'));
    }
}
