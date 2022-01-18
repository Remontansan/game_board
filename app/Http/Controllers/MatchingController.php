<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;


class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matching.matching_start');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function matching_start()
    {
        $user = Auth::user();

        $user_profile = Profile::where('user_id', $user['id'])->first();

        $user_favorite1 = $user_profile['favorite_1'];
        $user_favorite2 = $user_profile['favorite_2'];
        $user_favorite3 = $user_profile['favorite_3'];


        // dd($user_profile);
        // dd($user_favorite1);
        // dd($user_profile);
        // dd($user_profile);

        if($user_profile['favorite_1'] != null && $user_profile['favorite_2'] != null && $user_profile['favorite_3'] != null){

            $other_profiles = Profile::where(function ($query) use ($user_favorite1, $user_favorite2, $user_favorite3) {
                $query->where('favorite_1', $user_favorite1)
                ->orWhere('favorite_2', $user_favorite1)
                ->orWhere('favorite_3', $user_favorite1)
                ->orWhere('favorite_1', $user_favorite2)
                ->orWhere('favorite_2', $user_favorite2)
                ->orWhere('favorite_3', $user_favorite2)
                ->orWhere('favorite_1', $user_favorite3)
                ->orWhere('favorite_2', $user_favorite3)
                ->orWhere('favorite_3', $user_favorite3);
            })->where('user_id','<>', $user['id'])
            ->inRandomOrder()->get();

        } elseif($user_profile['favorite_1'] != null && $user_profile['favorite_2'] != null && $user_profile['favorite_3']  == null) {

            $other_profiles = Profile::where(function ($query) use ($user_favorite1, $user_favorite2) {
                $query->where('favorite_1', $user_favorite1)
                ->orWhere('favorite_2', $user_favorite1)
                ->orWhere('favorite_3', $user_favorite1)
                ->orWhere('favorite_1', $user_favorite2)
                ->orWhere('favorite_2', $user_favorite2)
                ->orWhere('favorite_3', $user_favorite2);
            })->where('user_id','<>', $user['id'])->inRandomOrder()->get();

        } elseif($user_profile['favorite_1'] != null && $user_profile['favorite_2'] == null && $user_profile['favorite_3']  == null) {


            $other_profiles = Profile::where(function ($query) use ($user_favorite1) {
                $query->where('favorite_1', $user_favorite1)
                ->orWhere('favorite_2', $user_favorite1)
                ->orWhere('favorite_3', $user_favorite1);
            })->where('user_id','<>', $user['id'])->inRandomOrder()->get();


        } else {

            $other_profiles = null;
            return view('matching.matching_result',compact('other_profiles'));
        }

        return view('matching.matching_result',compact('other_profiles'));
        
    }

    public function friendship(Request $request, $id)
    {
        $input = $request->all();

    }

}
