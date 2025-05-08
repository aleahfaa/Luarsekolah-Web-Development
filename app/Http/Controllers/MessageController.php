<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);
        Message::create($validated);
        return redirect('/')->with('success', 'Message sent successfully!');
    }
}
