@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Article</div>

                <div class="panel-body">
                  @if(count($errors)>0)
                  <div>
                  <ul>
                  @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                  </ul>
                  </div>
                  @endif
                    <form class="form-horizontal" method="POST" action="/addarticle">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">title</label>

                            <div class="col-md-6" style="">
                                <input id="title" type="text" class="form-control" name="title" value="{{Request::old('name')}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                              <label class="col-md-4 control-label" for="sel1">Category list (select one):</label>
                              <div class="col-md-6" style="">

                              <select class="form-control" name="cat" id="sel1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>
                              <br>
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Write Something Amazing : </label>

                            <div class="col-md-6">
                          <textarea class="form-control" rows="100" style="resize: none;" name="data" id="comment"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="private" > Private ?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
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
