@extends('layouts.friendRequestList')

@section('content')

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


<div class="container mb-4">

<a class="btn btn-primary mb-4" href="/friend" role="button">フレンド一覧</a>
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
    @foreach ($friendRequests as $friendRequest)
    <tr>
      <th scope="row">{{ $friendRequest['nickname'] }}</th>
      <td>{{ $friendRequest['user_name'] }}</td>
      <td>{{ $friendRequest['gender'] }}</td>
      <td>{{ $friendRequest['age'] }}</td>
      <td>
      <a href="/friend/request/approval/{{ $friendRequest['user_id'] }}" class="btn btn-primary mb-2">承認</a>
      <a href="/friend/request/rejection/{{ $friendRequest['user_id'] }}" class="btn btn-primary mb-2">拒否</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection