<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guest;

class Dashboard extends Component
{
    public $admin;
    public function render()
    {
        $this->admin = Guest::all();
        return view('livewire.edit');
    }
}
