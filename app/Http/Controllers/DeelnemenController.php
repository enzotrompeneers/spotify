<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spotify;
use App\Artist;
use App\Track;
use App\User;
use App\Contest;
use App\Participation;
use Illuminate\Support\Facades\Auth;

class DeelnemenController extends Controller
{
    public function index() {
        $admin_email = User::where('isAdmin', 1)->value('email');
        $contest_available = Contest::all();
        $date_now = date('Y-m-d G:i:s');
        $contest_id = 0;
        $message = "";

        if (!$contest_available->isEmpty()) {
            foreach($contest_available as $contest) {
                $contest_id = $contest['id'];
                
                $active_contest = Contest::where('id', '=', $contest_id)->first();
                if ($date_now >= $contest['startDate'] && $date_now <= $contest['endDate']) {
                   
                    
                    $active_contest->isActive = 1;
                    $active_contest->save();
                    
                    $message = null;
                    break;
                } else {
                    $message = "Momenteel is er geen wedstrijd aan de gang.";
                    $active_contest->isActive = 0;
                    $active_contest->save();
                }
            }
        } else {
            $message = "Er zijn nog geen wedstrijddatums aangemaakt.";
            return view('deelnemen', compact('message'));
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

        return view('deelnemen', compact('artists1', 'artists2', 'tracks_from_artist1', 'tracks_from_artist2', 'all_tracks_shuffled', 'message', 'contest_id', 'admin_email'));
    }

    public function store(Request $request, $contest_id) {
        $auth_id = Auth::id();
        $points = 0;
        $current_points = 0;
        $participation_over = "De wedstrijd is afgelopen, bedankt om mee te spelen! Je behaalde een score van:  ";
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

        $current_points = Participation::where(['user_id' => $auth_id, 'contest_id' => $contest_id])->value('points');
        $total_points = $current_points + $points;
        Participation::updateOrCreate(['user_id' => $auth_id, 'contest_id' => $contest_id], ['points' => $total_points]);

        return redirect()->route('home')->with('participationOver', $participation_over . $points . '. Totale score: ' . $total_points);
    }
}
