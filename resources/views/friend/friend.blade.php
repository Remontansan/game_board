@extends('layouts.friendList')

@section('content')

<div class="container mb-4">

<a class="btn btn-primary mb-4" href="/friend/requestList" role="button">フレンド申請一覧</a>
<a class="btn btn-primary mb-4" href="/gameboard" role="button">掲示板へ</a>
<a class="btn btn-primary mb-4" href="/profile" role="button">プロフィールへ</a>
<a class="btn btn-primary mb-4" href="/matching" role="button">マッチングへ</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ニックネーム</th>
      <th scope="col">ユーザ名</th>
      <th scope="col">性別</th>
      <th scope="col">年齢</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach ($friends as $friend)
          
        <tr>
            <th scope="row">{{ $friend['friend_nickname'] }}</th>
            <td>{{ $friend['friend_name'] }}</td>
            <td>{{ $friend['friend_gender'] }}</td>
            <td>{{ $friend['friend_age'] }}</td>
            <td></td>
        </tr>

        @endforeach

  </tbody>
</table>
</div>


@endsection