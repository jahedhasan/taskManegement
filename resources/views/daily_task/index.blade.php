@extends('layouts.app')
@section('title' , 'DailyTask')
@section('content')
<div class="container">

  <a href="{{ route('daily_task.create') }}" class="btn btn-info">Add New Task</a>
  
  <h2>Daily task index</h2>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $key=>$task)

      <tr>
        <th scope="row">{{ $key +1 }}</th>
        <td>{{ $task->title }}</td>
        <td>
          @if($task->is_enable == true)
              <span class="badge badge-info">Enable</span>
          @else
              <span class="badge badge-danger">Disable</span>
          @endif
        {{--   <a href="" >{{ $task->is_enable == '0' ? 'Disable': 'Enable' }}</a> --}}
        </td>
        <td>
          <a href="{{ route('daily_task.edit', $task->id) }}" class="btn btn-info btn-sm">Edit</a>

          <form id="delete-form-{{ $task->id }}" action="{{ route('daily_task.destroy',$task->id) }}" style="display: none;" method="POST">
              @csrf
              @method('DELETE')
          </form>
          <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $task->id }}').submit();
          }else {
              event.preventDefault();
                  }">Delete</button>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>

</div>
@endsection
