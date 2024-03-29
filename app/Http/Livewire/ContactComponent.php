<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'comment'=>'required'
        ]);
    }
    public function sendMessage(){
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'comment'=>'required'
        ]);
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();
        session()->flash('message','Thanks for your contact, Your Message has been sent successfully!');
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->comment = '';
    }
    public function render()
    {
        $settings = Setting::find(1);
        return view('livewire.contact-component',['settings'=>$settings])->layout('layouts.home');;
    }
}
