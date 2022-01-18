@extends('layouts.gameboard')

@section('content')

<div class="container mb-4">
    <div class="card" >
    <div class="card-header">
        投稿
    </div>
    <form method="POST" action="/gameboard">
    @csrf
        <input type='hidden' name='user_id' value="{{ $user['id'] }}">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <fieldset>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">ユーザ名</label>
                        <input type="text" name="user_name" id="disabledTextInput" class="form-control" value="{{ $user['name'] }}" readonly>
                    </div>
                </fieldset>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">ゲーム名</label>
                    <input type="text" name="game_name" class="form-control" id="formGroupExampleInput" placeholder="ゲーム名を入力してください">
                </div>
                <div class="form-group">
                    <label for="date" class="col-form-label">日時を入力</label>
                    <input type="datetime-local" class="form-control" id="date" name="deadline">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">目的</label>
                    <textarea class="form-control" name="game_content" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <input class="btn btn-primary" type="submit" value="投稿">
                <a class="btn btn-primary" href="/gameboard" role="button">一覧へ</a>
            </li>
        </ul>
    </form>
    </div>

</div>

@endsection