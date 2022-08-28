<?php

namespace App\Http\Livewire;

use App\Models\Highlight;
use Livewire\Component;

class Highlights extends Component
{
    public $load=20;
    public function render()
    {
        $highlights=Highlight::limit($this->load)->get();
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
