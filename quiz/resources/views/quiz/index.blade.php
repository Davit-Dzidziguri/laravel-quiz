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
            <h5>Quiz List</h5>
        </div>
        <div class="col-sm-6">
            <div class="text-end mb-2"><a class="btn btn-primary" href="{{route('quiz.create')}}">Add</a></div>
        </div>
    </div>
    <div>
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            @foreach($quizzes as $quiz)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$quiz->name}}</td>
                    <td>{{$quiz->description}}</td>
                    <td><img src="{{asset('storage/'.$quiz->photo)}}"  width="100" height="100"/></td>

                    <td>
                        <a href="{{route('quiz.edit',$quiz->id)}}">
                            <i class="fas fa-pen btn btn-primary">Edit</i></a>
                        <a onclick="deleteit({{$quiz->id}})" type="button"><i
                                class="fa fa-trash btn btn-danger">Delete</i></a>

                    </td>

                </tr>
            @endforeach

        </table>

    </div>

</div>
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>

<script>
    function deleteit(id) {
        $.ajax({
            url: '{{url('quiz')}}/' + id,
            type: 'DELETE',
            dataTypes: "JSON",
            data: {
                '_token': "{{csrf_token()}}"
            },
            success: function () {
                window.location.reload();
            }
        });

    }
</script>
</body>
</html>
