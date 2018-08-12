<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <p>Welcome {{Auth::user()->name}}</p>
                        <a href="{{ url('/home') }}">My Article</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                  {{ csrf_field() }}
                                                              </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">

              <header class="w3-container w3-center w3-padding-32">
                <h1><b>The Biggest Web Stie In Articles</b></h1>
                <p>Join us now to start publish your Articles From Here <a href="{{route('register')}}"><button class="btn btn-info">
                    join
                </button></a></p>
              </header>
                  <form method="get" action="/search">
                <div class="container w3-center w3-padding-32">
                      <div class="form-group row" style=" margin-left: 350px;
    padding: 10px;">
                        <div class="col-xs-4">
                          <label for="ex3">Search :</label><input type="text" class="form-control" name="search">
                        </div>
                      <div class="col-xs-2">
                          <label for="ex1">Category :</label>
                          <select class="form-control" id="sel1" name="cat">
                          <option>Any</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          </select>
                        </div>

</div>
<button type="submit" class="btn btn-info">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>
</form>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Lateset article</div>
                  <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Category</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($art as $artt)
                          <tr>
                            <td>{{$artt->title}}</td>
                            <td>{{$artt->category}}</td>
                            <td>
                              <a href="/art/view/{{$artt->id}}">
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






  </div>
</body>
</html>
