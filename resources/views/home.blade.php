@extends('layouts.app')
@section('content')
<script>
function myFunction(id) {
    var txt;
    var r = confirm("confirm to delete ");
    if (r == true) {
window.location.replace("/art/delete/"+id);
    }
  }
</script>
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Your Articles</div>
            <div class="panel-body">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Public</th>
                      <th>Published?</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $boo=1;?>
                    @foreach($art_list as $art)
                    <?php $boo=0;?>
                    <tr>
                      <td>{{ $art->title}}</td>
                      <td>{{ $art->category }}</td>
                      <td>@if($art->public==1) Yes
                        @else No
                        @endif
                       </td>
                       <td>@if($art->ispublished==1) Yes
                         @else Pending
                         @endif
                        </td>
                      <td>
                        <a href="/art/edit/{{$art->id}}">
                        <button class="btn btn-info">
                            Edit
                        </button>
                      </a>
                      </td>
                      <td>
                        <button onclick="myFunction({{$art->id}});" class="btn btn-danger">
                            Delete
                        </button>
                      </td>
                      <td>
                        <a href="/art/view/{{$art->id}}">
                        <button class="btn btn-info">
                            View
                        </button>
                      </a>
                      </td>

                    </tr>
                    @endforeach
                    @if($boo==1)
                    <tr>
                      <td colspan="4" align="center">
                      You have no Articles
                    </td>
                    </tr>
                    @endif
                  </tbody>
                </table>

              <a href="./addarticle">
              <button type="submit" class="btn btn-primary">
                  Add Article
              </button>
            </a>

            </div>
        </div>
    </div>
  </div>
  @if(Auth::user()->isadmin==1)
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Article Needed to Confirm to publish</div>
        <div class="panel-body">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Category</th>
                    </tr>
              </thead>
              <tbody>
                @foreach($artn_list as $art)
                <tr>
                  <td>{{ $art->title }}</td>
                  <td>{{ $art->category }}</td>
                  <td>
                    <a href="/art/publish/{{$art->id}}">
                    <button class="btn btn-info">
                        publish
                    </button>
                  </a>
                  </td>
                  <td>
                    <button onclick="myFunction({{$art->id}});" class="btn btn-danger">
                        delete
                    </button>
                  </td>

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
@endif
</div>
</div>

@endsection
