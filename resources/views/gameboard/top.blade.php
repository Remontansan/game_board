@extends('layouts.gameboard')

@section('content')

<div class="container mb-4">

  <!-- フラッシュメッセージ -->
  <script type="text/javascript">
            // {{--成功時--}}
            @if (session('msg_success'))
                $(function () {
                    toastr.success('{{ session('msg_success') }}');
                });
            @endif

            // {{--失敗時--}}
            @if (session('msg_danger'))
                $(function () {
                    toastr.error('{{ session('msg_danger') }}');
                });
            @endif
</script>

  <a class="btn btn-primary mb-4" href="/gameboard/create" role="button">投稿</a>
  <a class="btn btn-primary mb-4" href="/profile" role="button">プロフィールへ</a>
  <a class="btn btn-primary mb-4" href="/matching" role="button">マッチングへ</a>
  <a class="btn btn-primary mb-4" href="/friend" role="button">フレンド一覧へ</a>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col" style="width: 10%">ユーザ名</th>
        <th scope="col" style="width: 10%">ゲーム名</th>
        <th scope="col" style="width: 40%">目的</th>
        <th scope="col" style="width: 10%">締め切り時間</th>
        <th scope="col" style="width: 10%">〆</th>
      </tr>
  </thead>
  <tbody>
  @foreach ($game_boards as $game_board)
    <tr>
      <th scope="row" class="game_board">{{ $game_board['user_name'] }}</th>
      <td>{{ $game_board['game_name'] }}</td>
      <td>{{ $game_board['content'] }}</td>
      <td>{{ $game_board['deadline'] }}</td>
      <td>
        @if ($game_board['user_id'] == $user['id'] )
          <a href="/gameboard/{{$game_board['board_id']}}/edit" class="btn btn-primary mb-2">編集</a>
        @endif

        <a href="/gameboard/reply/{{$game_board['board_id']}}" class="btn btn-primary mb-2">返信</a>

        @if ($game_board['user_id'] == $user['id'] )
          <form method="POST" action="/gameboard/{{ $game_board['board_id'] }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">
                    削除
            </button>
          </form>
        @endif

        @if ($game_board['user_id'] != $user['id']  )
          <a href="/friend/request/{{$game_board['user_id']}}" class="btn btn-primary mb-2">フレンド申請</a>
        @endif

      </td>
    </tr>
  @endforeach
    </tbody>
  </table>
</div>

@endsection