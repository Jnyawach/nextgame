<?php

namespace App\Http\Livewire;

use App\Models\Popular;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $popular=Popular::all();
        return view('livewire.footer',[
            'popular'=>$popular
        ]);
    }
}
