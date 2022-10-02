<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\League;
use App\Models\Popular;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $foo;
    public $countries=null;
    public $leagues=null;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],


    ];

    public function updatingSearch()
    {
        $this->countries=Country::where('name', 'like', '%'.$this->search.'%')->limit(3)->get();
        $this->leagues=League::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
    }
    public function render()

    {

        $popular=Popular::all();
        return view('livewire.search',[
            'popular'=>$popular,

        ]);
    }
}
