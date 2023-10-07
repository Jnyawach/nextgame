<?php

namespace App\Http\Livewire;

use App\Models\Highlight;
use Carbon\Carbon;
use Livewire\Component;

class Highlights extends Component
{
    public $load=10;
    public $search;
    public $foo;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],


    ];


    public function render()
    {   $time=Carbon::now()->addHour();
        $keyword='highlights'.$this->load;
        $highlights= Highlight::orderBy('match_date','DESC')->when($this->search,function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%');
        })->limit($this->load)->get();


        $recent=$highlights[0];
        $headers=$highlights->slice(1,2);
        return view('livewire.highlights',[
            'highlights'=>$highlights,
            'recent'=>$recent,
            'headers'=>$headers
        ]);
    }

    public function loadMore(){
        $this->load=$this->load+10;
    }
}
