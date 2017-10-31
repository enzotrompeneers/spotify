<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Spotify;
use App\Artist;
use App\Track;

class DeelnemerController extends Controller
{
    public function show ($id) {
        return view ('deelnemer', compact('id'));
    }
    public function store(Request $request) {
        $artist1_id = $request->get("artist1_id");
        $artist2_id = $request->get("artist2_id");
    
        $artist1_tracks = json_decode($request->get("artist1_tracks"), true);
        $artist2_tracks = json_decode($request->get("artist2_tracks"), true);

        if() {
            
        }
        
        var_dump(compact('artist1_id', 'artist1_tracks', 'artist2_id', 'artist2_tracks'));die;
    }
}
