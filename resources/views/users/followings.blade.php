@extends('layouts.app')

@section('content')
    <div class='row'>
        <aside class='col-sm-4'>
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class='col-sm-8'>
            {{-- タブ --}}
            @include('users.navtabs')
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            @endif
            {{-- ユーザ一覧 --}}
            @include('users.users')
        </div>
    </div>
@endsection