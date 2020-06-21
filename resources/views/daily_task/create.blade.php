@extends('layouts.app')
@section('title' , 'Create Task')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Add new task</h4>
              </div>

              @include('layouts.partial.msg')

              <div class="card-body">
                <div class="card-content">
                  <form method="POST" action="{{ route('daily_task.store') }}" >
                      @csrf

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                  <label class="control-label">Title</label>
                                  <input type="text" class="form-control" name="title">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                <label class="content-label" >Status</label>
                                <select class="form-control" name="is_enable">
                                  <option value="1">Enable</option>
                                  <option value="0">Disable</option>
                                </select>
                              </div>
                          </div>
                      </div>
                  
                      <a href="{{ route('daily_task.index') }}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection