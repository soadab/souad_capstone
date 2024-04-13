<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous d'importer le modèle User
use App\Models\Message;

class DashboardController extends Controller
{

    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();
    
        // Récupérer les messages reçus par l'utilisateur connecté
        $messages = $user->receivedMessages;
    
        return view('Admin.Auth.dashboard', compact('user', 'messages'));
    }
    public function sendMessage(Request $request)
    {
        // Validation des données de formulaire
        $request->validate([
            'message' => 'required|string',
            'receiver_email' => 'required|email|exists:users,email',
        ]);

        // Récupérer l'utilisateur connecté
        $sender = auth()->user();

        // Récupérer l'utilisateur destinataire par son email
        $receiver = User::where('email', $request->receiver_email)->first();

        // Créer le message
        $message = new Message();
        $message->sender_id = $sender->id;
        $message->receiver_id = $receiver->id;
        $message->content = $request->message;
        $message->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Message envoyé avec succès.');
    }
}

