<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show (){
        return view ('contacts.show');
    }

    public function store (Request $request){
        //Enviamos el email de contacto
        if (Mail::to('bielmaimo16@gmail.com')->send(new ContactNotification($request->email, $request->message))){
            return back()->with ('success', 'Hemos recibido su consulta, en breve nos pondremos en contacto contigo');
        }else{
            return back()->with('error','No hemos podido enviar su mensaje');
        }
    }
}
