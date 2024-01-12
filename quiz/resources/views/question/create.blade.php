<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question-Create</title>
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
            <h5> Create Question </h5>
        </div>
        <div class="col-sm-6">
            <div class="text-end mb-2"><a class="btn btn-primary" href="{{route('question.index')}}">Back</a></div>
        </div>
    </div>

    <div>
        <form class="form-group" method="POST" action="{{ route('question.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-12 mb-4">
                    {!! Form::select('quiz_id', [''=>'Select Quiz ']+$quiz,old('quiz_id'),['class'=>'form-select','id'=>'quiz_id','required']) !!}

                </div>
                <div class="col-md-12 mb-2">
                    <label class="form-label"> Question </label>
                    <textarea class="form-control " name="question_name" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">A. <input class="form-control " id="aread" type="name" name="a" required></div>
                    <div class="col-md-6">B. <input class="form-control " id="bread" type="name" name="b" required></div>
                </div>
                <div class="row">
                    <div class="col-md-6">C. <input class="form-control " id="cread" type="name" name="c" required></div>
                    <div class="col-md-6">D. <input class="form-control "  id="myButton" type="name" name="d" required></div>
                </div>


                <div class="col-md-5 mt-4">
                    <select name="correct_answer" class="form-select" required aria-label="Default select example">
                        <option value="">Select Right Answer</option>
                        <option  value="a">A</option>
                        <option  value="b">B</option>
                        <option  value="c">C</option>
                        <option  value="d">D</option>
                    </select>
                </div>


                <div class="col-md-3 mt-4">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>


</div>
</body>
</html>
