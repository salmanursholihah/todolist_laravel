<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Message;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Log;


// class MessageController extends Controller
// {
//     public function indexAdmin() {
//         $users = User::where('id', '!=', Auth::id())->get();
//         return view('admin.chat.index', compact('users'));
//     }

//     public function indexUser() {
//         $users = User::where('role', 'admin')->get();
//         return view('chat.index', compact('users'));
//     }

//     public function chatWithAdmin($receiverId) {
//         $receiver = User::findOrFail($receiverId);
//         $messages = Message::where(function ($query) use ($receiverId) {
//             $query->where('sender_id', Auth::id())
//                   ->where('receiver_id', $receiverId);
//         })->orWhere(function ($query) use ($receiverId) {
//             $query->where('sender_id', $receiverId)
//                   ->where('receiver_id', Auth::id());
//         })->orderBy('created_at', 'asc')->get();

//         return view('admin.chat.show', compact('receiver', 'messages'));
//     }

//     public function chatWithUser($receiverId) {
//         $receiver = User::findOrFail($receiverId);
//         $messages = Message::where(function ($query) use ($receiverId) {
//             $query->where('sender_id', Auth::id())
//                   ->where('receiver_id', $receiverId);
//         })->orWhere(function ($query) use ($receiverId) {
//             $query->where('sender_id', $receiverId)
//                   ->where('receiver_id', Auth::id());
//         })->orderBy('created_at', 'asc')->get();

//         return view('chat.show', compact('receiver', 'messages'));
//     }

//     // public function send(Request $request) {
//     //     $request->validate([
//     //         'receiver_id'   => 'required|exists:users,id',
//     //         'content'       => 'nullable|string',
//     //         'attachments.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     //         'voice_note'    => 'nullable|file|mimes:webm,mp3,wav|max:5120',
//     //     ]);

//     //     if (!$request->filled('content') && !$request->hasFile('attachments') && !$request->hasFile('voice_note')) {
//     //         return response()->json([
//     //             'status'  => 'error',
//     //             'message' => 'Minimal kirim teks, gambar, atau voice note.'
//     //         ], 422);
//     //     }

//     //     $message = new Message();
//     //     $message->sender_id   = Auth::id();
//     //     $message->receiver_id = $request->receiver_id;
//     //     $message->content     = $request->content;

//     //     // Simpan voice note
//     //     if ($request->hasFile('voice_note')) {
//     //         $file = $request->file('voice_note');
//     //         $filename = time() . '_' . $file->getClientOriginalName();
//     //         $file->storeAs('public/voice_notes', $filename);
//     //         $message->voice_note = $filename;
//     //     }

//     //     // Simpan gambar
//     //     if ($request->hasFile('attachments')) {
//     //         $filenames = [];
//     //         foreach ($request->file('attachments') as $attachment) {
//     //             $name = time() . '_' . $attachment->getClientOriginalName();
//     //             $attachment->storeAs('public/message_attachments', $name);
//     //             $filenames[] = $name;
//     //         }
//     //         $message->attachment = json_encode($filenames);
//     //     }

//     //     $message->save();

//     //     return response()->json(['status' => 'success', 'message' => 'Pesan terkirim']);
//     // }
// public function send(Request $request)
// {
//     $request->validate([
//         'receiver_id' => 'required|exists:users,id',
//         'content' => 'nullable|string',
//         'attachments.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'voice_note' => 'nullable|file|mimes:webm,mp3,wav|max:5120',
//     ]);

//     // Pastikan minimal ada isi
//     if (!$request->filled('content') && !$request->hasFile('attachments') && !$request->hasFile('voice_note')) {
//         return response()->json(['status' => 'error', 'message' => 'Pesan tidak boleh kosong!'], 422);
//     }

//     $message = new Message();
//     $message->sender_id = auth()->id();
//     $message->receiver_id = $request->receiver_id;
//     $message->content = $request->content;

//     // Simpan voice note jika ada
//     if ($request->hasFile('voice_note')) {
//         $file = $request->file('voice_note');
//         Log::info ('voice note size: ' .$file->getSize());


//         $filename = time() . '_voice_note.' . $file->getClientOriginalExtension();
//         $file->storeAs('public/voice_notes', $filename);
//         $message->voice_note = $filename;
//     }

//     // Simpan gambar (multi-upload)
//     if ($request->hasFile('attachments')) {
//         $filenames = [];
//         foreach ($request->file('attachments') as $file) {
//             $name = time() . '_' . $file->getClientOriginalName();
//             $file->storeAs('public/message_attachments', $name);
//             $filenames[] = $name;
//         }
//         $message->attachment = json_encode($filenames); // ✅ disimpan sebagai JSON
//     }

//     $message->save();

//     return response()->json(['status' => 'success']);
// }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function indexAdmin()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.chat.index', compact('users'));
    }

    public function indexUser()
    {
        $users = User::where('role', 'admin')->get();
        return view('chat.index', compact('users'));
    }

    public function chatWithAdmin($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        $messages = $this->getMessages($receiverId);
        return view('admin.chat.show', compact('receiver', 'messages'));
    }

    public function chatWithUser($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        $messages = $this->getMessages($receiverId);
        return view('chat.show', compact('receiver', 'messages'));
    }

    private function getMessages($receiverId)
    {
        return Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id'   => 'required|exists:users,id',
            'content'       => 'nullable|string',
            'attachments.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'voice_note'    => 'nullable|file|mimes:webm,mp3,wav|max:5120',
        ]);

        if (!$request->filled('content') && !$request->hasFile('attachments') && !$request->hasFile('voice_note')) {
            return response()->json(['status' => 'error', 'message' => 'Pesan tidak boleh kosong!'], 422);
        }

        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $request->receiver_id;
        $message->content = $request->content;

        // Simpan voice note jika ada
        if ($request->hasFile('voice_note')) {
            $file = $request->file('voice_note');
            $filename = time() . '_voice_note.' . $file->getClientOriginalExtension();
            $file->storeAs('public/voice_notes', $filename);
            $message->voice_note = $filename;
        }

        // Simpan gambar (multi-upload)
        if ($request->hasFile('attachments')) {
            $filenames = [];
            foreach ($request->file('attachments') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/message_attachments', $name);
                $filenames[] = $name;
            }
            $message->attachment = $filenames;
        }

        $message->save();

        return response()->json(['status' => 'success']);
    }
}
