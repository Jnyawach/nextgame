<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class FavoriteForm extends Component
{
    public $fixture;
    public function render()
    {
        return view('livewire.favorite-form');
    }

    public function AddFavorite(){

        Cookie::queue('favorite_id', $this->fixture, 60);
        dd($fixture=Cookie::get('favorite_id'));
    }
}
