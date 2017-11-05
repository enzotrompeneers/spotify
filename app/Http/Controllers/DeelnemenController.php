<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spotify;
use App\Artist;
use App\Track;
use App\Contest;
use App\Participation;
use Illuminate\Support\Facades\Auth;

class DeelnemenController extends Controller
{
    public function index() {
        $contest_available = Contest::all();
        $date_now = date('Y-m-d G:i:s ');
        $contest_id = 0;
        $message = "";

        if (!$contest_available->isEmpty()) {
            foreach($contest_available as $contest) {
                if ($date_now > $contest['startDate'] && $date_now < $contest['endDate']) {
                    $contest_id = $contest['id'];
                    $message = null;
                    break;
                } else {
                    $message = "Momenteel is er geen wedstrijd aan de gang.";
                }
            }
        } else {
            $message = "Er zijn nog geen wedstrijddatums aangemaakt.";
        }

        $spotify = Spotify::inRandomOrder()->take(2)->get();

    	$artists1 = Artist::
    		where('spotify_id', $spotify[0]->id)
    		->get();

    	$artists2 = Artist::
    		where('spotify_id', $spotify[1]->id)
            ->get();

    	$tracks_from_artist1 = Track::
    		where('artist_id', $artists1[0]->id)
    		->inRandomOrder()
    		->take(3)
            ->get(['id','name']);
    		
    	$tracks_from_artist2 = Track::
    		where('artist_id', $artists2[0]->id)
	    	->inRandomOrder()
	    	->take(3)
            ->get(['id','name']);
            

        $all_tracks_shuffled = $tracks_from_artist1
            ->merge($tracks_from_artist2)
            ->shuffle();

        return view('deelnemen', compact('artists1', 'artists2', 'tracks_from_artist1', 'tracks_from_artist2', 'all_tracks_shuffled', 'message', 'contest_id'));
    }

    public function store(Request $request, $contest_id) {
        $auth_id = Auth::id();
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

        $points = 0;

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

        Participation::create(['points' => $points,  'user_id' => $auth_id, 'contest_id' => $contest_id]);

        return back();
    }
}
