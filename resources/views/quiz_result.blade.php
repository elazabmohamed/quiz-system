<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}} Result
    </x-slot>


            @foreach ($quiz->questions as $question )
            @if($question->correct_answer == $question->my_answers->answer)
            <h5 class="text-success text-uppercase mt-4 fs-4">Correct</h5>
            @else
            <h5 class="text-danger text-uppercase mt-4 fs-4">Wrong</h5>

            @endif
            {{$loop->iteration}}.  <strong> {{$question->question}}</strong>
            
                <div class="form-check">
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                      {{$question->answer1}}
                    </label>
                    @if('answer1' == $question->correct_answer)
                        <i class="badge bg-success text-success text-uppercase text-white"> correct answer</i>
                    @elseif('answer1'==$question->my_answers->answer)
                        <i class="badge bg-danger text-uppercase text-white"> your answer</i>
                    @endif
                </div>
                    <div class="form-check">
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                        {{$question->answer2}}
                    </label>
                    @if('answer2' == $question->correct_answer)
                        <i class="badge bg-success text-success text-uppercase text-white"> correct answer</i>
                    @elseif('answer2'==$question->my_answers->answer)
                        <i class="badge bg-danger text-uppercase text-white"> your answer</i>
                    @endif
                </div>
                    <div class="form-check">
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                        {{$question->answer3}}
                    </label>
                    @if('answer3' == $question->correct_answer)
                        <i class="badge bg-success text-success text-uppercase text-white"> correct answer</i>
                    @elseif('answer3'==$question->my_answers->answer)
                        <i class="badge bg-danger text-uppercase text-white"> your answer</i>
                    @endif
                </div>
                    <div class="form-check">
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                        {{$question->answer4}}
                    </label>
                    @if('answer4' == $question->correct_answer)
                        <i class="badge bg-success text-success text-uppercase text-white"> correct answer</i>
                    @elseif('answer4'==$question->my_answers->answer)
                        <i class="badge bg-danger text-uppercase text-white"> your answer</i>
                    @endif
                </div>
                @if($loop->last)
                <hr>
                @endif
            @endforeach 

        </div>
    </div>


</x-app-layout>
