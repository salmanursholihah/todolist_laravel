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

// public function send(Request $request)
// {
//     $request->validate([
//         'receiver_id' => 'required|exists:users,id',
//         'content' => 'nullable|string',
//         'attachments.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);

//     $message = new Message();
//     $message->sender_id = auth()->id();
//     $message->receiver_id = $request->receiver_id;
//     $message->content = $request->content;

//     // Proses upload file
//     $attachments = [];
//     if ($request->hasFile('attachments')) {
//         foreach ($request->file('attachments') as $file) {
//             $filename = time() . '_' . $file->getClientOriginalName();
//             $file->storeAs('/storage/message_attachments', $filename); // simpan di storage
//             $attachments[] = $filename;
//         }
//         $message->attachment = json_encode($attachments);
//     }

//     $message->save();

//     return response()->json(['success' => true]);
// }

public function send(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'content' => 'nullable|string',
        'attachments.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $message = new Message();
    $message->sender_id = auth()->id();
    $message->receiver_id = $request->receiver_id;
    $message->content = $request->content;

    $attachments = [];
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan langsung ke folder public/storage/message_attachments
            $destinationPath = public_path('storage/message_attachments');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // buat folder jika belum ada
            }
            $file->move($destinationPath, $filename);
            $attachments[] = $filename;
        }
        $message->attachment = json_encode($attachments);
    }

    $message->save();

    return response()->json(['success' => true]);
}


}
