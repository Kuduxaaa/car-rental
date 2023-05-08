<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'message' => 'required',
        ]);

        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $phone_number = $request->get('phone_number');
        $message = $request->get('message');

        if (substr($phone_number, 0, 4) !== '+995') 
        {
            $phone_number = '+995' . $phone_number;
        }

        if (strlen($phone_number) !== 13)
        {
            return redirect()->back()->withErrors(['message' => 'Please enter correct phone number']);
        }

        Messages::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'message' => $message
        ]);

        return view('thankyou');
    }
}
