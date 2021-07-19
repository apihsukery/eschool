<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
use DB;

class Register extends Component
{
    public $role_id;
    public $ic;
    public $name;
    public $email;

    protected $rules = [
        'role_id'   => 'required',
        'ic'        => 'required|unique:users|digits:12',
        'name'      => 'required|max:255',
        'email'     => 'required|unique:users',
    ];

    public function updated($propertyName) {

        $this->validateOnly($propertyName);
    }

    // public function updated($fields)
    // {
    //     $this->validateOnly($fields,[
    //         'role_id'   => 'required',
    //         'ic'        => 'required|unique:users|digits:12',
    //         'name'      => 'required|max:255',
    //         'email'     => 'required|unique:users'
    //     ]);
    // }

    public function submitForm()
    {
        $user = $this->validate([
            'role_id'   => 'required',
            'ic'        => 'required|unique:users|digits:12',
            'name'      => 'required|max:255',
            'email'     => 'required|unique:users'
        ]);
        dd($user);
    }
    public function render()
    {
        return view('livewire.register');
    }
}