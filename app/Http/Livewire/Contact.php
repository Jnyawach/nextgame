<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public  $name;
    public $email;
    public $subject;
    public $message;
    public $success=false;
    protected $rules=[
        'name' => 'required|string|max:100|min:3',
        'subject' => 'required|string|max:100',
        'email'=>'required|email|string|max:255',
        'message'=>'required|min:3|max:2000'
    ];
    protected $messages=[
        'name.required'=>'Please enter your name',
        'email.required'=>'Please enter your email',
        'email.email'=>'Please enter a valid email',
    ];

    public function render()
    {
        return view('livewire.contact');
    }

    public function createMessage()
    {
        $this->validate();
        $mess = \App\Models\Contact::create([
            'name' => $this->name,
            'subject' => $this->subject,
            'email' => $this->email,
            'message' => $this->message,

        ]);
        /*Mail::send('mailing.contact', ['mess'=>$mess], function ($message) use($mess){
            $message->to($mess->email);
            $message->subject($mess->subject);
        });*/
        $this->success=true;
    }
}
