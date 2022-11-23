<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Response extends Component
{
    public $message;
    public $response;
    protected $rules=([
        'response'=>'required|min:3|max:3000'
    ]);
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createResponse(){

        $mess=\App\Models\Contact::findOrFail($this->message->id);

        $this->validate();
        $mess->update([
            'response'=>$this->response,
            'user_id'=>Auth::id(),
        ]);
       /* Mail::send('mailing.response', ['mess'=>$mess], function ($message) use($mess){
            $message->to($mess->email);
            $message->subject($mess->subject);

        });*/
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.response');
    }
}
