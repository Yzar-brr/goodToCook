<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminUsers extends Component
{
    public $users;
    public bool $role;

    

    public function demote($id){
        $user = User::find($id);
        $user->role = 'user';
        $user->save();
    }
    public function promote($id){
        $user = User::find($id);
        $user->role = 'admin';
        $user->save();
    }
    public function render()
    {
        $this->users = User::all();
        return view('livewire.admin-users');
    }
}
