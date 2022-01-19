@extends('layouts.profile')

@section('content')
<div class="container">

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

@if (empty( $judgment ))

    <a class="btn btn-primary mb-4" href="/gameboard" role="button">掲示板へ</a>
    <a class="btn btn-primary mb-4" href="/matching" role="button">マッチングへ</a>
    <a class="btn btn-primary mb-4" href="/friend" role="button">フレンド一覧へ</a>

@endif

    <form method="POST" action="/profileStore">
        @csrf

        @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    
        <div class="form-group">
            <label for="subject">
                ニックネーム
            </label>
            <input
                id="name"
                name="nickname"
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ $name = isset($profile['nickname']) ? $profile['nickname'] : '' }}"
                type="text"
            >
        </div>
    
        <div class="form-group">
            <label for="subject">
                    性別
            </label>
            <br>
            @if ($profile['gender'] == '男')
    
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

            @if ($profile['gender'] == '女')
    
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

            @if ($profile['gender'] == 'その他')
    
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
                value="{{ $name = isset($profile['age']) ? $profile['age'] : '' }}"
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
                value="{{ $name = isset($profile['favorite_1']) ? $profile['favorite_1'] : '' }}"
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
                value="{{ $name = isset($profile['favorite_2']) ? $profile['favorite_2'] : '' }}"
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
                value="{{ $name = isset($profile['favorite_3']) ? $profile['favorite_3'] : '' }}"
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
            >{{ $name = isset($profile['content']) ? $profile['content'] : '' }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">
                更新
        </button>
    </form>
</div>

@endsection