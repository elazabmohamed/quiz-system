
<x-app-layout>
    <x-slot name="header">Add a new question to: "{{$quiz->title}}"</x-slot>

    <div class="card">

        <div class = "card-body">
            <a href="{{route('questions.index', $quiz->id)}}" class="btn btn-outline-primary" style="margin-bottom: 10px;">Go Back</a>


            <form method="POST" action="{{route('questions.store', $quiz->id)}}">
                @csrf
                <div class="form-group">
                    <label>Question *</label>
                    <textarea name="question" style="margin-bottom: 10px;" class="form-control" rows="4">{{old('question')}}</textarea>                
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Answer</label>
                            <textarea name="answer1" style="margin-bottom: 10px;" class="form-control" rows="4">{{old('answer1')}}</textarea>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Answer</label>
                            <textarea name="answer2" style="margin-bottom: 10px;" class="form-control" rows="4">{{old('answer2')}}</textarea>                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Answer</label>
                            <textarea name="answer3" style="margin-bottom: 10px;" class="form-control" rows="4">{{old('answer3')}}</textarea>                
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Answer</label>
                            <textarea name="answer4" style="margin-bottom: 10px;" class="form-control" rows="4">{{old('answer4')}}</textarea>                
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Correct Answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1. Answer</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. Answer</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. Answer</option>
                        <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. Answer</option>
                    </select>                
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" style="margin-top: 10px;" class="btn btn-outline-success">Add Question</button>
                </div>
        </div>
    </div>
</x-app-layout>