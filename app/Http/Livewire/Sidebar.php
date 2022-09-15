<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\League;
use App\Models\Popular;
use Livewire\Component;

class Sidebar extends Component
{
    public $search;
    public $nation;
    public $menu;
    public $sidebar=false;
    public $foo;
    public $favorites=[];
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],

    ];
    public function render()
    {
        $popular=Popular::all();
        $countries=Country::when($this->search,function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%');
        })->get();
        return view('livewire.sidebar',[
            'popular'=>$popular,
            'countries'=>$countries
        ]);
    }

    public function Leagues($id){
        $this->menu=League::where('country_id',$id)->get();
        $this->nation=Country::findOrFail($id);
        $this->sidebar=true;
    }

    public function CloseMenu(){
        $this->sidebar=false;
        $this->nation=null;
        $this->menu=null;
    }

}
