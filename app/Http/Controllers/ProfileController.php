<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        $profile = Profile::where('user_id', $user['id'])->first();

        if(empty($profile))
        {
            $profile['gender'] = '男';

            return view('profile.profile',compact('profile'));
        }

        return view('profile.profile',compact('profile'));
    }
    public function profileStore(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        // dd($user);

        // dd($input);

        $profile = Profile::where('user_id', $user['id'])->first();

        if(empty($profile)){
            // DBに保存
            Profile::insertGetId([
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'nickname' => $input['nickname'],
                'gender' => $input['gender'],
                'age' => $input['age'],
                'favorite_1' => $input['game1'],
                'favorite_2' => $input['game2'],
                'favorite_3' => $input['game3'],
                'content' => $input['message'],
            ]);

            return redirect()->route('profile');
        
        }else{
            
            Profile::where('user_id', $user['id'])->update([

                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'nickname' => $input['nickname'],
                'gender' => $input['gender'],
                'age' => $input['age'],
                'favorite_1' => $input['game1'],
                'favorite_2' => $input['game2'],
                'favorite_3' => $input['game3'],
                'content' => $input['message'],
            ]);

            return redirect()->route('profile');
        
        }

        


    }

    public function profileUpdate($id)
    {

    }
}
