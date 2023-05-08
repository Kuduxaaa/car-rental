<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Messages::all();

        return view('admin.messages', ['messages' => $messages]);
    }

    public function delete($id)
    {
        $message = Messages::where('id', $id);

        if ($message)
        {
            $message->delete();
        }

        return redirect()->back();
    }
}
