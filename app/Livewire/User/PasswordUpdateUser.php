<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class PasswordUpdateUser extends Component
{
    public $id;
    public $password = '';
    public $password_confirmation = '';
    protected $rules = [
        'password' => 'required|string|min:6|max:200|confirmed',
        'password_confirmation' => '',
    ];
    public function updatePassword()
    {

        $this->validate();
        User::findOrFail($this->id)->update([
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'Registro Guardados');
    }
    public function render()
    {
        return view('livewire.user.password-update-user');
    }
}
