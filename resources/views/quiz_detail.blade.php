<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}}
    </x-slot>
    
    <div class="card" >
        <div class="card-body">

          <p class="card-text">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">{{$quiz->description}}</h5>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                      @if($quiz->my_result !==null && $quiz->my_result->score < $quiz->passing_score)
                      <li class="list-group-item d-flex justify-content-between align-items-center bg-danger text-white ">
                        My Score [Failed]
                        <span class="">{{$quiz->my_result->score}}%</span>
                      </li>
                      @elseif($quiz->my_result !==null && $quiz->my_result->score >= $quiz->passing_score)
                      <li class="list-group-item d-flex justify-content-between align-items-center bg-success text-white ">
                          My Score [Passed]
                          <span class="">{{$quiz->my_result->score}}%</span>
                      </li>
                      @endif
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Ends at
                          <span class="">{{$quiz->finished_at}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Duration
                          <span class="">{{$quiz->duration}} min</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Questions
                          <span class="">{{$quiz->questions_count}}</span>
                        </li>
                        @if($quiz->passing_score)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Passing Score
                          <span class="">{{$quiz->passing_score}}%</span>
                        </li>
                        @endif
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Participants
                          <span class="">{{$quiz->details['join_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Average Score
                          <span class="">{{$quiz->details['average']}}%</span>
                        </li>
                        @endif
                      </ul>
                </div>
            </div>
          </p>
          @if($quiz->my_result)
          <button class="btn btn-danger mt-2" disabled>You've already taken this quiz</button>
          @elseif (!$quiz->my_result)
          <a href="{{route('quiz.join', $quiz->slug)}}" class="btn btn-outline-primary mt-2">Take Quiz</a>
          @endif
        </div>
      </div>

</x-app-layout>
