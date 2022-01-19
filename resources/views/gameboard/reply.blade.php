@extends('layouts.gameboard')

@section('content')
<div class="container">
    
      <!-- フラッシュメッセージ -->
        <script>
        @if (session('flash_message'))
            $(function () {
            toastr.success('{{ session('flash_message') }}');
            });
        @endif
        </script>

    <div class="card">
        <div class="card-header">
            <div class="mb-3">

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">投稿者</label>
                    <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $game_board['user_name'] }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">ゲーム名</label>
                    <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $game_board['game_name'] }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">投稿</label>
                    <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $game_board['content'] }}" readonly>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
        @foreach ($replies as $reply)
            <a href="/gameboard/reply_to_reply/{{ $reply['send_reply_id'] }}" class="text-dark text-decoration-none table-hover">
                <li class="list-group-item">
                    <div class="form-inline">
                        <label for="disabledTextInput" class="form-label">ユーザ名:</label>
                        <input type="text" name="user_name" id="disabledTextInput" class="form-control mb-2 ml-2" value="{{ $reply['send_user_name'] }}" readonly>
                    </div>
                    <label for="disabledTextInput" class="form-label">コメント</label>
                    <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $reply['send_reply_content'] }}" readonly>
                </li>
            </a>
        @endforeach
        </ul>
        </div>
    </div>
</div>


<div class="container mb-4 mt-3" style="">
    <div class="card" >
    <div class="card-header">
        返信
    </div>
    <form method="POST" action="/gameboard/replyStore">
    @csrf
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">返信</label>
                  <textarea class="form-control" name="reply_content" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
                <input class="btn btn-primary" type="submit" value="返信">
                <button type="button" class="btn btn-primary" onClick="history.back()">1つ戻る</button>
                <a class="btn btn-primary" href="/gameboard" role="button">一覧へ</a>
            </li>
        </ul>
        <input name="board_id" type="hidden" value="{{ $game_board['board_id'] }}">
    </form>
    </div>
    </div>
</div>
@endsection