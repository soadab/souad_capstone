<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('Admin.Auth.login');
    }

    public function doLogin(Request $request)
    {
        // Valider les données du formulaire
        $rules = [
            'username' => 'required|email',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Si la validation échoue, rediriger vers la page de connexion avec les erreurs
        if ($validator->fails()) {
            return redirect()->route('Admin.login')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // Créer les données de l'utilisateur pour l'authentification
            $credentials = [
                'email'    => $request->input('username'),
                'password' => $request->input('password'),
            ];

            // Tenter d'authentifier l'utilisateur
            if (Auth::attempt($credentials)) {
                // Authentification réussie, rediriger vers le tableau de bord
                return redirect()->route('Admin.dashboard');
            } else {
                // Authentification échouée, rediriger vers la page de connexion
                return redirect()->route('Admin.login')->withErrors([
                    'username' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
                ]);
            }
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        return view('Admin.Auth.register');
    }

    public function doRegister(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
    ], [
        'password.regex' => 'Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.',
    ]);

    // Créer un nouvel utilisateur
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->save();

    // Authentifier l'utilisateur nouvellement créé
    Auth::login($user);

    // Rediriger l'utilisateur vers la page de connexion avec un message de succès
    return redirect()->route('Admin.login')->with('success', 'Inscription réussie ! Bienvenue.');
}
}
