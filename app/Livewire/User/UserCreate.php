<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class UserCreate extends Component
{
    public  $label = 'Usuario';
    public $labelPlural = 'Usuarios';
    // public $edit_var = false;

    public $id;
    public $edit = false;

    public $name;
    public $email;
    public $phone;
    public $country;
    public $city;
    public $address;
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
        'phone' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'password' => 'required|string|min:6|max:200|confirmed',
    ];

    public function mount($id = null)
    {
        // $this->password = '';
        // $this->password_confirmation = $this->password;
        $this->edit = boolval($id);
        $this->id = $id;
        $user = User::factory()->make();
        if ($this->edit) {
            $user = User::findOrFail($id);
            // $this->name = $user->name;
            // $this->email = $user->email;
            // $this->phone = $user->phone;
            // $this->country = $user->country;
            // $this->city = $user->city;
            // $this->address = $user->address;
        }
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->country = $user->country;
        $this->city = $user->city;
        $this->address = $user->address;
    }

    public function store()
    {

        if ($this->edit) {
            $user = User::findOrFail($this->id);
            $this->rules['email'] = ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->id)];
            $this->rules['password'] = 'sometimes|string|min:6|max:200|confirmed';
        } else {
            $user = new User();
        }

        $this->validate();

        $user->fill($this->only(['name', 'email', 'phone', 'country', 'city']));

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        return redirect()->route('dashboard.users.index')->with('success', 'Registro Guardados');
    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->role = $this->user->getRoleNames()->first();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.user.user-create');
    }
}
