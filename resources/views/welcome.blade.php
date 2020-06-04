@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Tasklistを使ってみよう！</h1>
            {!! link_to_route('signup.get', '新規登録はこちら', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection
