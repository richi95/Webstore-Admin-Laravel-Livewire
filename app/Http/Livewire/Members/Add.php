<?php

namespace App\Http\Livewire\Members;

use Livewire\Component;

class Add extends Component
{
    public $accountVisible = false;

    public function showAccount(){

        return $this->accountVisible = true;
    }

    public $count = 1;
    

    public function increments(){
        return $this->count++;
    }

    public function decrements(){
        return $this->count--;
    }

    public function render()
    {
        return view('livewire.members.add');
    }
}
