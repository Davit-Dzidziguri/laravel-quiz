<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz-Create</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('home')}}">DashBoard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('quiz.index')}}">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('question.index')}}">Question</a>
                </li>


            </ul>

        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h5> Create Quiz </h5>
        </div>
        <div class="col-sm-6">
            <div class="text-end mb-2"><a class="btn btn-primary" href="{{route('quiz.index')}}">Back</a></div>
        </div>
    </div>

       <div>
           <form class="form-group" method="POST" action="{{ route('quiz.store') }}" enctype="multipart/form-data">
               @csrf
               <div class="col-md-12 mb-2">
                   <label class="form-label">Name</label>
                   <input type="text" class="form-control " name="name" required >
               </div>
               <div class="col-md-12 mb-2">
                   <label class="form-label">Description</label>
                   <input type="text" class="form-control" name="description" required >
               </div>
               <div class="col-md-12 mb-2">
                   <label class="form-label">Photo</label>
                   <input type="file" class="form-control" name="photo"  required>
               </div>
               <div class="col-md-3 mt-4">
                   <button class="btn btn-primary" type="submit">Submit</button>
               </div>

           </form>
       </div>


</div>


</body>
</html>
