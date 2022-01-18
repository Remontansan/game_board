@extends('layouts.gameboard')

@section('content')

<div class="container ">

    <div class="card" style="">
        <div class="card-header">
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">返信者</label>
                <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $receive_reply['send_user_name'] }}" readonly>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">返信</label>
                <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $receive_reply['send_reply_content'] }}" readonly>
            </div>
        </div>
        <ul class="list-group list-group-flush">
        @foreach ($send_replies as $send_reply)
            <a href="/gameboard/reply_to_reply/{{ $send_reply['send_reply_id'] }}" class="text-dark text-decoration-none">
                <li class="list-group-item">
                    <div class="form-inline">
                        <label for="disabledTextInput" class="form-label">ユーザ名:</label>
                        <input type="text" name="user_name" id="disabledTextInput" class="form-control mb-2 ml-2" value="{{ $send_reply['send_user_name'] }}" readonly>
                    </div>
                    <label for="disabledTextInput" class="form-label">コメント</label>
                    <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $send_reply['send_reply_content'] }}" readonly>
                </li>
            </a>
        @endforeach
        </ul>
    </div>

</div>

<div class="container mb-4 mt-3" style="">
    <div class="card" >
    <div class="card-header">
        返信
    </div>
    <form method="POST" action="/gameboard/reply_to_reply_Store">
    @csrf
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">返信</label>
                  <textarea class="form-control" name="send_reply_content" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
                <input class="btn btn-primary" type="submit" value="返信">
                <button type="button" class="btn btn-primary" onClick="history.back()">1つ戻る</button>
                <a class="btn btn-primary" href="/gameboard" role="button">一覧へ</a>
            </li>
        </ul>
        <input name="receive_reply_id" type="hidden" value="{{ $receive_reply['send_reply_id'] }}">
        <input name="receive_user_id" type="hidden" value="{{ $receive_reply['send_user_id'] }}">
        <input name="receive_user_name" type="hidden" value="{{ $receive_reply['send_user_name'] }}">
        <input name="receive_reply_content" type="hidden" value="{{ $receive_reply['send_reply_content'] }}">
    </form>
    </div>
    </div>
</div>


@endsection