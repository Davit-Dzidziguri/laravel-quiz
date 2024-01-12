<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h2>{{$quiz->name}}</h2>
        </div>
    @foreach($questions as $question)
        <div class="row mb-3">
            <div class="col-sm-12">
                <h5>Q.{{$loop->iteration}}. {{$question->question_name}}</h5>
            </div>
            <div class="col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio"  name="{{$question->id}}" onclick="checkAnswer({{$question->id}})" id="flexRadioDefault{{$question->id}}a">
                    <label class="form-check-label" for="flexRadioDefault{{$question->id}}a">
                        A. {{$question->a}}
                    </label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" onclick="checkAnswer({{$question->id}})"  id="flexRadioDefault{{$question->id}}b">
                    <label class="form-check-label" for="flexRadioDefault{{$question->id}}b">
                        B. {{$question->b}}
                    </label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" onclick="checkAnswer({{$question->id}})" id="flexRadioDefault{{$question->id}}c">
                    <label class="form-check-label" for="flexRadioDefault{{$question->id}}c">
                        C. {{$question->c}}
                    </label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" onclick="checkAnswer({{$question->id}})" id="flexRadioDefault{{$question->id}}d">
                    <label class="form-check-label" for="flexRadioDefault{{$question->id}}d">
                        D. {{$question->d}}
                    </label>
                </div>
            </div>
            <h6 id="correct_answer_{{$question->id}}" class="text-success mt-1"></h6>
        </div>
        @endforeach
    <div>


    </div>

</div>
</div>
<script src="{{asset('js/jquery-3.7.1.js')}}"></script>

<script>
   function checkAnswer(id){
        $.ajax({
            url: '{{ url('student/getData') }}',
            type: 'get',
            data: { id: id },
            success: function (response) {
                $("#correct_answer_"+id).text('Correct answer is: '+response);
            }
      });
    }
</script>
</body>
</html>
