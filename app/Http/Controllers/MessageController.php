<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
 

    public function indexAdmin() {
    $users = User::where('id', '!=', Auth::id())->get();
    return view('admin.chat.index', compact('users'));
}

// public function indexUser() {
//     $admins = User::where('role', 'admin')->get();
//     return view('chat.index', compact('admins'));
// }

public function indexUser() {
    $users = User::where('role', 'admin')->get();
    return view('chat.index', compact('users'));
}


    public function chatWithAdmin($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get(); 
        return view ('admin.chat.show', compact('receiver', 'messages'));           
    }

    public function chatWithUser($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get(); 
        return view ('chat.show', compact('receiver', 'messages'));           
    }

    public function send (Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:255',
   ]);
            $messages = new Message();
            $messages->sender_id = Auth::id();
            $messages->receiver_id = $request->receiver_id;
            $messages->content = $request->content;
            $messages->save();

return response()->json(['success'=>true]);     

    }

}
