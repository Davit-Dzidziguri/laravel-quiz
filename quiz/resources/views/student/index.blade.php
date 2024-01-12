<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz-Index</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h5>Student</h5>
        </div>

    </div>
    <div>
        <table class="table table-bordered">
            <tr>

                <th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Start</th>
            </tr>
            @foreach($quizzes as $quiz)
                <tr>

                    <td><img src="{{asset('storage/'.$quiz->photo)}}"  width="100" height="100"/></td>
                    <td>{{$quiz->name}}</td>
                    <td>{{$quiz->description}}</td>
                    <td><a href="{{url("student/quiz/$quiz->id")}}" class="btn btn-info">Start</a></td>
                </tr>
            @endforeach

        </table>

    </div>

</div>
</body>
</html>
