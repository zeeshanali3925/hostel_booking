<?php 
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index'); // چیٹ کا فرنٹ اینڈ پیج دکھائے گا
    }

    public function fetchMessages()
    {
        return Message::with('sender') // پیغام بھیجنے والے کی تفصیلات شامل کریں
            ->where('receiver_id', Auth::id()) // وہ پیغامات لوڈ کرے گا جو اس یوزر کے لیے ہیں
            ->get();
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::id(), // لاگ ان یوزر بطور بھیجنے والا
            'receiver_id' => $request->receiver_id, // جس کو پیغام جا رہا ہے
            'message' => $request->message
        ]);

        return response()->json($message);
    }
}






