@extends('layouts.matching')

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


<a class="btn btn-primary mb-4" href="/gameboard" role="button">掲示板へ</a>
<a class="btn btn-primary mb-4" href="/profile" role="button">プロフィールへ</a>
<a class="btn btn-primary mb-4" href="/friend" role="button">フレンド一覧へ</a>

    @foreach ($other_profiles as $other_profile)

    <div class="card mb-4" >
    <div class="card-header">
            @csrf
            <div class="form-group">
            <input type='hidden' name='user_id' value="{{ $other_profile['user_id'] }}">
                <label for="subject">
                    ニックネーム
                </label>
                <input
                    id="name"
                    name="nickname"
                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    value="{{ $name = isset($other_profile['nickname']) ? $other_profile['nickname'] : '' }}"
                    type="text"
                >
            </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="form-group">
                <label for="subject">
                        性別
                </label>
                <br>
                @if ($other_profile['gender'] == '男')
        
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="男" checked>
                        <label class="form-check-label" for="inlineRadio1">男</label>
                    </div>

                @else

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="男">
                        <label class="form-check-label" for="inlineRadio1">男</label>
                    </div>

                @endif

                @if ($other_profile['gender'] == '女')
        
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="女" checked>
                        <label class="form-check-label" for="inlineRadio1">女</label>
                    </div>

                @else

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="女">
                        <label class="form-check-label" for="inlineRadio1">女</label>
                    </div>

                @endif

                @if ($other_profile['gender'] == 'その他')
        
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="その他" checked>
                        <label class="form-check-label" for="inlineRadio1">その他</label>
                    </div>

                @else

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="その他">
                        <label class="form-check-label" for="inlineRadio1">その他</label>
                    </div>

                @endif
            </div>
            
            <div class="form-group">
                <label for="age">
                    年齢
                </label>
                <input
                    id="age"
                    name="age"
                    class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}"
                    value="{{ $name = isset($other_profile['age']) ? $other_profile['age'] : '' }}"
                    type="text"
                >
            </div>


            <div class="form-group">
                <label for="game">
                    好きなゲーム1
                </label>
                <input
                    id="game"
                    name="game1"
                    class="form-control {{ $errors->has('game') ? 'is-invalid' : '' }}"
                    value="{{ $name = isset($other_profile['favorite_1']) ? $other_profile['favorite_1'] : '' }}"
                    type="text"
                >
            </div>

            <div class="form-group">
                <label for="game">
                    好きなゲーム2
                </label>
                <input
                    id="game"
                    name="game2"
                    class="form-control {{ $errors->has('game') ? 'is-invalid' : '' }}"
                    value="{{ $name = isset($other_profile['favorite_2']) ? $other_profile['favorite_2'] : '' }}"
                    type="text"
                >
            </div>

            <div class="form-group">
                <label for="game">
                    好きなゲーム3
                </label>
                <input
                    id="game"
                    name="game3"
                    class="form-control {{ $errors->has('game') ? 'is-invalid' : '' }}"
                    value="{{ $name = isset($other_profile['favorite_3']) ? $other_profile['favorite_3'] : '' }}"
                    type="text"
                >
            </div>



            <div class="form-group">
                <label for="message">
                    メッセージ
                </label>

                <textarea
                    id="message"
                    name="message"
                    class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                    rows="4"
                >{{ $name = isset($other_profile['content']) ? $other_profile['content'] : '' }}</textarea>
            </div>
            
            <a href="/friend/request/matching/{{$other_profile['user_id']}}" class="btn btn-primary mb-2">フレンド申請</a>
        </form>
        </li>
    </ul>
    </div>
        

        

    @endforeach

</div>


@endsection
