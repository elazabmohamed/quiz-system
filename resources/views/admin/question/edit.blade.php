
<x-app-layout>
    <x-slot name="header">Edit question: "{{$question->question}}"</x-slot>

    <div class="card">

        <div class = "card-body">
            <a href="{{route('questions.index', $question->quiz_id)}}" class="btn btn-outline-primary" style="margin-bottom: 10px;">Go Back</a>

            <form method="POST" action="{{route('questions.update', [$question->quiz_id,$question->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Question *</label>
                    <textarea name="question" style="margin-bottom: 10px;" class="form-control" rows="4">{{$question->question}}</textarea>                
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Answer</label>
                            <textarea name="answer1" style="margin-bottom: 10px;" class="form-control" rows="4">{{$question->answer1}}</textarea>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Answer</label>
                            <textarea name="answer2" style="margin-bottom: 10px;" class="form-control" rows="4">{{$question->answer2}}</textarea>                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Answer</label>
                            <textarea name="answer3" style="margin-bottom: 10px;" class="form-control" rows="4">{{$question->answer3}}</textarea>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Answer</label>
                            <textarea name="answer4" style="margin-bottom: 10px;" class="form-control" rows="4">{{$question->answer4}}</textarea>                
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Correct Answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if($question->correct_answer==='answer1') selected @endif value="answer1">1. Answer</option>
                        <option @if($question->correct_answer==='answer2') selected @endif value="answer2">2. Answer</option>
                        <option @if($question->correct_answer==='answer3') selected @endif value="answer3">3. Answer</option>
                        <option @if($question->correct_answer==='answer4') selected @endif value="answer4">4. Answer</option>
                    </select>                
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" style="margin-top: 10px;" class="btn btn-outline-success">Edit Question</button>
                </div>
        </div>
    </div>
</x-app-layout>