<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\admin\School\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $school_name;

    public function register()
    {
        $this->validate([
            'school_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $school = School::query()->create([
            'name' => $this->school_name,
            'email' => $user->email,
            'status' => 'active',
        ]);

        $user->forceFill(['school_id' => $school->id])->save();

        session()->flash('success', 'Register berhasil');

        // Arahkan user untuk mengisi profil sekolahnya
        return $this->redirectRoute('schools.edit', ['school' => $school->id], navigate: true);

        // return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
