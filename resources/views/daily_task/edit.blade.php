@extends('layouts.app')
@section('title' , 'Edit Task')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Update task</h4>
              </div>

              @include('layouts.partial.msg')

              <div class="card-body">
                <div class="card-content">
                  <form method="POST" action="{{ route('daily_task.update', $task->id) }}" >
                      @csrf
                      @method('PUT')

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                  <label class="control-label">Title</label>
                                  <input type="text" class="form-control" name="title" value="{{ $task->title }}">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                <label class="content-label" >Status</label>
                                <select class="form-control" name="is_enable">
                                  <option {{ $task->is_enable == 1 ? 'selected' : '' }} value="1">Enable</option>
                                  <option {{ $task->is_enable == 0 ? 'selected' : '' }} value="0">Disable</option>
                                </select>
                              </div>
                          </div>
                      </div>
                  
                      <a href="{{ route('daily_task.index') }}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection