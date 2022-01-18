<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Reply;
use App\Reply_to_reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class GameBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $game_boards = Board::orderByRaw('`deadline` IS NULL ASC')->orderBy('deadline')->orderBy('board_id', 'desc')->get();

        return view('gameboard.top',compact('game_boards','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        // dd($user);

        return view('gameboard.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // dd($input);

        $request->validate([
            'game_name'     => 'required|max:100',
            'user_name'      => 'required|max:100',
            'game_content' => 'max:100',
            'deadline' => 'nullable|after:"now"',
        ]);

        Board::insertGetId([
            'user_id' => $input['user_id'],
            'game_name' => $input['game_name'], 
            'deadline' => $input['deadline'],
            'user_name' => $input['user_name'],
            'content' => $input['game_content'],
        ]);

        return redirect()->route('gameboard.index')->with('msg_success', '投稿が完了しました');
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
    public function edit($gameboard)
    {
        $game_board = Board::where('board_id',$gameboard)->first();

        $user = Auth::user();


        return view('gameboard.edit',compact('game_board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gameboard)
    {
        $input = $request->all();

        Board::where('board_id', $gameboard)->update([

            'game_name' => $input['game_name'],
            'deadline' => $input['deadline'],
            'content' => $input['content'],

        ]);

        return redirect(route('gameboard.index', ['gameboard' => $gameboard]))->with('msg_success', '編集が完了しました');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gameboard)
    {
        Board::where('board_id', $gameboard)->delete();

        return redirect()->route('gameboard.index')->with('msg_danger', '削除が完了しました');

    }

    public function reply($id)
    {
        // $user = Auth::user();

        $game_board = Board::where('board_id',$id)->first();

        $replies = Reply::where('board_id', $id)->get();
        
        // dd($game_board);
        // dd($replies);

        return view('gameboard.reply',compact('game_board','replies'));
    }

    public function replyStore(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        //dd($input);
        //dd($user);



        Reply::insertGetId([
            'board_id' => $input['board_id'],
            'send_user_id' => $user['id'],
            'send_user_name' => $user['name'],
            'send_reply_content' => $input['reply_content'],
        ]);
        
        return redirect(route('reply', ['id' => $input['board_id'],]))->with('flash_message', '返信が完了しました');
        //return redirect('/gameboard/reply/$input[board_id]');
        //return redirect()->route('gameboard.reply');
    }

    public function reply_to_reply($id)
    {
        
        $receive_reply = Reply::where('send_reply_id', $id)->first();

        $send_replies = Reply::where('receive_reply_id', $id)->get();

        // dd($send_replies);
        // dd($receive_reply);

        if(!$send_replies)
        {

            return view('gameboard.reply_to_reply',compact('receive_reply'));
     
        }

        return view('gameboard.reply_to_reply',compact('receive_reply','send_replies'));
    }

    public function reply_to_reply_Store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        // dd($input);
        //dd($user);

        Reply::insertGetId([
            'receive_reply_id' => $input['receive_reply_id'],
            'receive_user_id' => $input['receive_user_id'],
            'receive_user_name' => $input['receive_user_name'],
            'receive_reply_content' => $input['receive_reply_content'],
            'send_user_id' => $user['id'],
            'send_user_name' => $user['name'],
            'send_reply_content' => $input['send_reply_content'],
        ]);
        
        return redirect(route('reply_to_reply', ['id' => $input['receive_reply_id'],]));
        //return redirect('/gameboard/reply/$input[board_id]');
        //return redirect()->route('gameboard.reply');
    }


}
