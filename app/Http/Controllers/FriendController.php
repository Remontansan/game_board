<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\Profile;
use App\Friendship;
use Illuminate\Support\Facades\Auth;


class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $friends = Friend::where('user_id', $user['id'])->get();

        return view('friend.friend',compact('friends'));
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
        
    }

    public function friendRequest($id)
    {
        // dd($id);

        $to_user = Profile::where('user_id', $id)->first();

        // dd($to_user);

        $user = Auth::user();
        $from_user = Profile::where('user_id', $user['id'])->first();

        $aledy = Friendship::where('to_user_id' ,$id)->where('user_id' ,$user['id'])->first();

        if (empty($aledy)){

            Friendship::insertGetId([
                'user_id' => $from_user['user_id'],
                'user_name' => $from_user['user_name'], 
                'nickname' => $from_user['nickname'],
                'gender' => $from_user['gender'],
                'age' => $from_user['age'],
                'to_user_id' => $to_user['user_id'],
                'to_user_name' => $to_user['user_name'], 
                'to_nickname' => $to_user['nickname'],
                'is_like' => true
            ]);

            return redirect()->route('gameboard.index')->with('msg_success', 'フレンド申請しました');


        }elseif($aledy['is_like'] == '0' ){

            return redirect()->route('gameboard.index')->with('msg_danger', 'もうフレンドです');


        }else{

            return redirect()->route('gameboard.index')->with('msg_danger', 'もうフレンド申請してます');

        }
    }

    public function friendRequestFromMatching($id)
    {
        // dd($id);

        $to_user = Profile::where('user_id', $id)->first();

        // dd($to_user);

        $user = Auth::user();
        $from_user = Profile::where('user_id', $user['id'])->first();

        $aledy = Friendship::where('to_user_id' ,$id)->where('user_id' ,$user['id'])->first();

        if (empty($aledy)){

            Friendship::insertGetId([
                'user_id' => $from_user['user_id'],
                'user_name' => $from_user['user_name'], 
                'nickname' => $from_user['nickname'],
                'gender' => $from_user['gender'],
                'age' => $from_user['age'],
                'to_user_id' => $to_user['user_id'],
                'to_user_name' => $to_user['user_name'], 
                'to_nickname' => $to_user['nickname'],
                'is_like' => true
            ]);

            return redirect()->route('matching_start')->with('msg_success', 'フレンド申請しました');

        }elseif($aledy['is_like'] == '0' ){

            return redirect()->route('matching_start')->with('msg_danger', 'もうフレンドです');

        }else{

            return redirect()->route('matching_start')->with('msg_danger', 'もうフレンド申請してます');

        }
    }


    public function friendRequestList()
    {
        $user = Auth::user();
        $friendRequests = Friendship::where('to_user_id', $user['id'])->where('is_like','!=', false)->get();

        return view('friend.friendRequestList',compact('friendRequests'));
    }

    public function friendRequestApproval($id)
    {
        $user = Auth::user();

        $friend = Profile::where('user_id', $id)->first();

        // dd($id);
        // dd($friend);
        // dd($user);

        Friend::insertGetId([
            'user_id' => $user['id'],
            'friend_id' => $friend['user_id'], 
            'friend_name' => $friend['user_name'],
            'friend_nickname' => $friend['nickname'],
            'friend_gender' => $friend['gender'],
            'friend_age' => $friend['age'],
        ]);

        Friendship::where('user_id', $id)->where('to_user_id', $user['id'])->update(['is_like' => 0]);

        

        return redirect()->route('friendRequestList')->with('msg_success', 'フレンド申請を承認しました');
    }

    public function friendRequestRejection($id)
    {
        $user = Auth::user();

        Friendship::where('to_user_id', $id)->where('user_id', $user['id'])->delete();

        return redirect()->route('friendRequestList')->with('msg_danger', 'フレンド申請を拒否しました');
    }

}
