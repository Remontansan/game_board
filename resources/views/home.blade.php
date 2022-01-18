@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="/gameboard" role="button">掲示板へ</a>
                    <a class="btn btn-primary" href="/profile" role="button">プロフィールへ</a>
                    <a class="btn btn-primary" href="/matching" role="button">マッチングへ</a>
                    <a class="btn btn-primary" href="/friend" role="button">フレンド一覧へ</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
