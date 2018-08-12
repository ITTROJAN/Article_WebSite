@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$art->title}} </div>
                <div class="panel-body">
                        {{ csrf_field() }}

                        <div class="form-group">
                              <label class="col-md-4 control-label" for="cat">Category :</label>
                              <div class="col-md-6" style="">
                              <p id="cat">{{$art->category}}</p>
                            </div>
                            <label class="col-md-4 control-label" for="cat">Published At :</label>
                            <div class="col-md-6" style="">
                              <p>{{$art->created_at}}</p>
                              </div>
                          </div>
                        <div class="form-group">
                            <div class="col-md-6">
                          <textarea style=" resize: none;border:none;" id='data' rows="20" cols="102" readonly>{{$art->data}}</textarea>
                            </div>
                        </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
