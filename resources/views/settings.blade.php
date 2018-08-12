@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Account Settings</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/edit">
                        {{ csrf_field() }}

                        <div class="form-group">
                          <label for="email" class="col-md-4 control-label">Name :</label>
                            <div class="col-md-4" style="">
                                    <input id="title" type="text" class="form-control" name="title" value="{{$user->name}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="email" class="col-md-4 control-label">Email :</label>
                            <div class="col-md-4" style="">
                                    <input id="title" type="text" class="form-control" name="title" value="{{$user->email}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="mem" class="col-md-4 control-label">Password :</label>
                            <div class="col-md-3" style="">
                              <a href="/settings/{{$user->id}}/password">
                              <button class="btn btn-primary">
                                  Change Password
                              </button>
                            </a>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="mem" class="col-md-4 control-label">Member :</label>
                            <div class="col-md-3" style="">
                              @if($user->isadmin==1)
                              <p id="mem">Admin</p>
                              @else
                              <p id="mem">Normal</p>
                              @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
