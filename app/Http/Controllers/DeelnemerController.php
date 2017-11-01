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

        $tracks_from_artist1 = Track::
        where('artist_id', $artist1_id)
        ->get()
        ->pluck('name')
        ->toArray();

        $tracks_from_artist2 = Track::
        where('artist_id', $artist2_id)
        ->get()
        ->pluck('name')
        ->toArray(); 

        $points = 10;

        if(isset($artist1_tracks)) {
            foreach($artist1_tracks as $track) {
                if((in_array($track, $tracks_from_artist1))) {
                    $points += 1;
                }
                else {
                    $points -=1;
                }
            }
        }

        if(isset($artist2_tracks)) {
            foreach($artist2_tracks as $track) {
                if((in_array($track, $tracks_from_artist2))) {
                    $points += 1;
                }
                else {
                    $points -=1;
                }
            }
        }

        var_dump(compact('points'));die;
    }
}
