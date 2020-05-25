@extends('layouts.app')

@section('content')
    <!-- ここにページ毎のコンテンツを書く -->
    <h1>id = {{ $task->id }}のタスクリストの内容</h1>
    
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>未/済</th>
            <th>タスク</th>
            
        </tr>
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-primary']) !!}
    
    <div class="mt-2"></div>
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection
