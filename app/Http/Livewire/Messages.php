<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    public $success=false;


    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.messages',[
            'messages'=>\App\Models\Contact::paginate(25),
        ]);
    }

    public function deleteMessage($id){
        $message=\App\Models\Contact::findOrFail($id);
        $message->delete();
        $this->success="Message Deleted Successfully";

    }
    public function readMessage($id){
        $message=\App\Models\Contact::findOrFail($id);
        $message->update(['status'=>1]);
    }
}
