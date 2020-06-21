<?php

// $task_list = [

//   'slug1' => [
//     'title' => 'some title',
//     'total_time' => '2h',
//     'other_data' => 'some other data',
//     'is_done' => 1,
//   ],
//   'slug2' => [
//     'title' => 'some title 2',
//     'total_time' => '2h',
//     'other_data' => 'some other data',
//     'is_done' => 1,
//   ],
//   'slug3' => [
//     'title' => 'some title 3',
//     'total_time' => '2h',
//     'other_data' => 'some other data 3',
//     'is_done' => 1,
//   ],
// ];


function get_meta_value( $task_list, $slug, $meta_key ) {

  // return $task_list[$slug][$meta_key];
  if ( array_key_exists($slug, $task_list )) {
    $slug_data = $task_list[$slug];
    if ( array_key_exists( $meta_key, $slug_data ) ) {
      return $slug_data[$meta_key];
    }else {
      return '';
    }
  } else {
    return '';
  }

}



?>
@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Task management index</h2>

  <div>

    @include('layouts.partial.msg')


    <div class="accordion" id="accordionExample">
      @foreach( $enable_tasks as $key=> $enable_task)

        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $key +1 }}" aria-expanded="false" aria-controls="collapseTwo">
                {{ $enable_task->title }}
              </button>
            </h2>
          </div>
          <div id="collapse{{ $key +1 }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">

              <form method="POST" action="{{ route('task_management.store') }}">
                @csrf
                <input type="hidden" name="title" value="{{ $enable_task->title }}">
                <input type="hidden" name="slug" value="{{ $enable_task->slug }}">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="is_done">Status</label>
                    <select name="is_done" class="form-control">
                      <?php $is_done = get_meta_value( $task_list, $enable_task->slug, 'is_done'); ?>
                      <option {{ $is_done == "1" ? 'selected' : '' }} value="1">Done</option>
                      <option {{ $is_done == "0" ? 'selected' : '' }} value="0">Undone</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="total_time">Total Time</label>
                    <?php $total_time = get_meta_value( $task_list, $enable_task->slug, 'total_time' ); ?>
                    <input type="text" class="form-control" name="total_time" value="{{ $total_time }}" placeholder="Total Time Write Here..">
                  </div>
                </div>
                <div class="form-group">
                  <label for="other_data">Other Note</label>
                  <?php $other_data = get_meta_value( $task_list, $enable_task->slug, 'other_data' ); ?>
                  <textarea class="form-control" name="other_data" rows="3" placeholder="Other Note Write Here.....">{{ $other_data }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>   

            </div>
          </div>
        </div>

      @endforeach
    </div>
  </div>
</div>
@endsection
