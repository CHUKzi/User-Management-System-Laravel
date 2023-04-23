
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Laravel User Management System - Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <h1 class="text-center">User Register Form</h1>
        <div class="d-flex justify-content-center">
            <form method="post" action="/savedata" class="card " style="width: 30rem; padding: 20px;">
                {{csrf_field()}}
                

                @include('layout/Alert')

                <div class="mb-3">
                    <label for="fname" class="form-label">First Name*</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your First Name">
                </div>

                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name*</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your Last Name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address*</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password*</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a Password">
                </div>

                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password*</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Again Enter Your Password">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </main>

@include('layout/Footer')



  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  </body>
</html>
