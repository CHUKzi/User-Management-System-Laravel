
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Laravel User Management System - Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/navbar-static/navbar-top.css" rel="stylesheet">

    <style>
        footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>

  </head>

  <body>

  @include('layout/Header')


    <main role="main" class="container">
  

    @if(Session::has('loginId'))

    <p>Hello {{$loginInfo->first_name}}</br> Profile <a href="" data-bs-toggle="modal" data-bs-target="#profile-view"><i class="fa fa-eye" aria-hidden="true"></i> View</a>  / Profile <a href="" data-bs-toggle="modal" data-bs-target="#profile-edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> </p>

    @include('layout/Alert')

<!-- Profile View -->
<div class="modal fade" id="profile-view" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
        <i class="fa fa-times" aria-hidden="true" data-bs-dismiss="modal"></i>
      </div>
      <div class="modal-body">

        <table>
            <tr>
                <td>FULL NAME :</td>
                <td>{{$loginInfo->first_name}} {{$loginInfo->last_name}}</td>
            </tr>
            <tr>
                <td>EMAIL ADDRESS :</td>
                <td>{{$loginInfo->email}}</td>
            </tr>
            
            <tr>
                <td>REGISTERD DATE & TIME :</td>
                <td>{{$loginInfo->created_at}}</td>
            </tr>

            <tr>
                <td>LAST PROFILE UPDATE :</td>
                <td>{{$loginInfo->updated_at}}</td>
            </tr>

            <tr>
                <td>DATABASE ID :</td>
                <td>{{$loginInfo->id}}</td>
            </tr>
        </table>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Profile View -->
<div class="modal fade" id="profile-edit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Profile</h5>
        <i class="fa fa-times" aria-hidden="true" data-bs-dismiss="modal"></i>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ url('/updateprofile/' .$loginInfo->id) }}">
        {{csrf_field()}}

        @method('PUT')

          <div class="mb-3">
            <label for="firstname" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$loginInfo->first_name}}">
          </div>

          <div class="mb-3">
            <label for="lastname" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$loginInfo->last_name}}">
          </div>

          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$loginInfo->email}}">
          </div>

          <h3>Change Password</h3>

          <div class="mb-3">
            <label for="ccpassword" class="col-form-label">Currunt Password:</label>
            <input type="password" class="form-control" id="ccpassword" name="ccpassword" placeholder="Enter Your Currunt Password">
          </div>

          <div class="mb-3">
            <label for="newpassword" class="col-form-label">New Password:</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter a New Password">
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
          
        </form>
        
        <a href="{{ url('/deletemyaccount/' .$loginInfo->id) }}"><button class="btn btn-danger float-right" onclick="return confirm('Are you Sure?')">Delete my account</button></a>

      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>

    
    @endif

        <h1>User List</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Register Date & Time</th>
                </tr>
            </thead>
            <tbody>


            @foreach($udatas as $udata)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$udata->first_name}} {{$udata->last_name}}</td>
                    <td>{{$udata->email}}</td>
                    <td>{{$udata->created_at}}</td>
                </tr>
            @endforeach

            </tbody>

            </table>

    </main>

    @include('layout/Footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </body>
</html>
