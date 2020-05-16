@extends('layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">Folder</div>
                    <div class="panel-body">
                        <a href="{{route('folders.create')}}" class="btn btn-default btn-block">Add Folder</a>
                    </div>
                    <div class="list-group">
                        @foreach($folders as $folder)
                            <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" 
                                class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                                {{ $folder->title }}
                            </a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="column col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Task</div>
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{route('tasks.create', ['id' => $current_folder_id])}}" class="btn btn-default btn-block">Add Task</a>
                        </div>
                    </div>
                    <table class="table">
                        <thread>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>DueDate</th>
                                <th></th>
                            </tr>
                        </thread>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    <span class="label {{$task->status_class}}">{{$task->status_label}}</span>
                                </td>
                                <td>{{$task->formatted_due_date}}</td>
                                <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id])}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
@endsection