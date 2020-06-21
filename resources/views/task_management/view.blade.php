{{-- <?php

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



?> --}}


@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Task management View</h2>

  <div>

    @include('layouts.partial.msg')


    <div class="accordion" id="accordionExample">
      @foreach( $task_views as $key=> $task_view)

        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $key +1 }}" aria-expanded="false" aria-controls="collapseTwo">
                {{ $task_view->task_date }}
              </button>
            </h2>
          </div>
          <div id="collapse{{ $key +1 }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
               <?php  
                  $task_list = json_decode($task_view->task_list , true);
               ?>
               @foreach($task_list as $single_task)
                <h3>{{ $single_task['title']  }}</h3>
                <ul>
                  <li>{{ $single_task['is_done'] == '0' ? 'Undone' : 'Done' }}</li>
                  <li>{{ $single_task['total_time'] }}</li>
                  <li>{{ $single_task['other_data'] }}</li>
                </ul>
               @endforeach

            </div>
          </div>
        </div>

      @endforeach

    </div>

    {{ $task_views->links() }}
    
  </div>
</div>
@endsection
