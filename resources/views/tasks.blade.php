<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                @lang(session()->get('success'))
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @lang(session()->get('error'))
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <!-- New Task Form -->
        <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
        @csrf
            <div class="card mb-4">
                <div class="card-header">@lang('message.task')</div>
                <div class="card-body">

                    <!-- Task Name -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i>   
                                @lang('message.add')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card mb-4">
        <div class="card-header">@lang('message.current')</div>
        <div class="card-body">

            @if (isset($tasksData) && count($tasksData) > 0)
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>@lang('message.name')</th>
                </thead>

                <!-- Table Body -->
                <tbody>

                @foreach ($tasksData as $task)
                <tr>
                    <!-- Task Name -->
                    <td class="table-text">
                        <div>{{ $task->name }} <span class="small">@lang('message.created_by') {{ $task->user->name }}</span></div>
                    </td>
                    <td>
                        <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                            @method('DELETE')
                            @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>   
                            @lang('message.delete')
                        </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
                {{ $tasksData->links() }}
            @else
                <p class="text-center">@lang('message.nothing')</p>
            @endif
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection
