<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function download()
    {
        // Chemin vers le fichier de sauvegarde de la base de données
        $path = storage_path('app/capstone_souad_backup_2024-03-27.sql');
        $filename = 'capstone_souad_backup_2024-03-27.sql';
    
        // Retourne la réponse de téléchargement
        return response()->download($path, $filename);
    }
    
}
