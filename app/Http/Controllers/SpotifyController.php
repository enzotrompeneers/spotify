<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spotify;
use App\Artist;
use App\Track;

class SpotifyController extends Controller
{
    public function show() {
    	$spotify = Spotify::inRandomOrder()->take(2)->get();

    	$artist1 = Artist::
    		where('spotify_id', $spotify[0]->id)
    		->get();

    	$artist2 = Artist::
    		where('spotify_id', $spotify[1]->id)
    		->get();

    	$tracks_from_artist1 = Track::
    		where('artist_id', $artist1[0]->id)
    		->inRandomOrder()
    		->take(3)
    		->get()
            ->pluck('name');
    		
    	$tracks_from_artist2 = Track::
    		where('artist_id', $artist2[0]->id)
	    	->inRandomOrder()
	    	->take(3)
	    	->get()
            ->pluck('name');

        $all_tracks_shuffled = $tracks_from_artist1
            ->merge($tracks_from_artist2)
            ->shuffle();
	    
    
    	return view ('deelnemen', compact('artist1', 'artist2', 'tracks_from_artist1', 'tracks_from_artist2', 'all_tracks_shuffled'));
    }
}
