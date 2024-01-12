<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register-Login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</head>

<body class="bg-gradient-info">


<div class="container  bg-light mt-5 ">
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body ">
                <h1 class="display-5 text-center pt-4"> welcome Back!</h1>
                <form class="form-group" method="POST" action="{{route('register.store')}}" >
                    @csrf
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Name </label>
                        <input type="text" class="form-control " name="name" value="{{old('name')}}" required >
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control " name="email" value="{{old('email')}}"  required >
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}"  required >
                    </div>


                    <div class="col-md-3 mt-4">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>


</body>
</html>
