<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Songcontroller;
use App\Http\Controllers\API\Registercontroller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

// namespace App\Http\Controllers\API;

// use Illuminate\Http\Request;

class PlaylistController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        dd($request->user());
        if($request->user() == null){
            return $this->sendError('Not logged in.', ['error'=>'Unauthorised']);
        }
        else{
            // $playlist = DB::table('playlists')
            // ->where('public', '=', 1)
            // ->orWhere('user_id', $id)
            // ->get();
            return $request->user();
         }

        $data = array();


        $playlists = Playlist::get();

        $playlists = Playlist::get()->where();
        return $playlists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {

        $songs = $playlist->song;
        foreach ($songs as $song){
            $song['artist'] = $song->artist;
            $song['genre'] = $song->genre;
            if ($song['duration'] <= '01:00:00'){
                $song['duration'] = date("i:s", strtotime( $song['duration']));
            }
        }
        // $playlist['songs'] = $songs;
        return $playlist;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}
