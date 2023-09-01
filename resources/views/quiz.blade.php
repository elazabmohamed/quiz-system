<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}}
    </x-slot>


        <form method="POST" action="{{route('quiz.result', $quiz->slug)}}">
            @csrf
            @foreach ($quiz->questions as $question )
            {{$loop->iteration}}.  <strong> {{$question->question}}</strong>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}1" value="answer1" required>
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                      {{$question->answer1}}
                    </label>
                </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}2" value="answer2" required>
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                        {{$question->answer2}}
                    </label>
                </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}3" value="answer3" required>
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                        {{$question->answer3}}
                    </label>
                </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio"name="{{$question->id}}" id="quiz{{$question->id}}4" value="answer4" required>
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                        {{$question->answer4}}
                    </label>
                </div>
                <hr>
  
            @endforeach 
            <button class="btn btn-success btn-block mt-4">Finish Quiz</button>
        </form>

        </div>
    </div>


</x-app-layout>
