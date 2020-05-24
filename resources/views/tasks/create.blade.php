@extends('layouts.app')

@section('content')
    <!-- ここにページ毎のコンテンツを書く -->
    <h1>新規タスクリストの作成</h1>
        <!--colをつける場合はrowを先につけるのは必須-->
        <div class="row">
        <div class="col-sm-8">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection
