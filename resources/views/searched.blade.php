@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Articles Matched</div>
                <div class="panel-body">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Category</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($list as $art)
                        <tr>
                          <td>{{ $art->title }}</td>
                          <td>{{ $art->category }}</td>
                          <td>
                            <a href="/art/view/{{$art->id}}">
                            <button class="btn btn-info">
                                View
                            </button>
                          </a>
                          </td>

                        </tr>
                        @endforeach

                      </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
