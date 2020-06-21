@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Task management Edit</h2>

  <div>

    @include('layouts.partial.msg')

    <div class="container">
      <form method="POST" action="{{ route('task_management.task_edit') }}">
        @csrf
        @method('PUT')
        Select Date:<input id="datepicker" name="date" width="276" />
        <button type="submit" style="margin-top: 5px" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>


{{-- @foreach( $task_lists as $task_list)
  <li>{{ $task_list }}</li>
@endforeach --}}
    
</div>
@endsection
