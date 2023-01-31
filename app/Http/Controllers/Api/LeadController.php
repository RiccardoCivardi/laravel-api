<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $success = true;

        //verificare i dati

        $validator = Validator::make($data,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required'
            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio',
                'name.min' => 'Il nome deve essere di almeno :min caratteri',
                'name.max' => 'Il nome deve avere al massimo :max caratteri',
                'email.required' => 'L\'email è un campo obbligatorio',
                'email.email' => 'L\'email non è formattata correttamente',
                'email.max' => 'L\'email deve avere al massimo :max caratteri',
                'message.required' => 'Il messaggio è un campo obbligatorio',
                'message.min' => 'Il messaggio deve avere al minimo :min caratteri',
            ]
        );

        // se il validator fallisce restituisco gli errori alla parte di front end
        if($validator->fails()){

            $success = false;
            $errors = $validator->errors();

            return response()->json(compact('success','errors'));
        }


        //salvare i dati nel db
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();


        //inviare l' email
        Mail::to('info@riccardo.com')->send(new NewContact($new_lead));

        return response()->json(compact('success'));
    }
}
