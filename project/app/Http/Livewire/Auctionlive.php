<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Auctionlive extends Component
{
    public function render()
    {
        return view('livewire.auctionlive');
    }

    public function test()
    {
        dd('Ok');
    }
}