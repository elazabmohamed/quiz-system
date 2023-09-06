<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}}
    </x-slot>
    <a href="{{route('dashboard')}}" class="btn btn-warning " style="margin-bottom: 10px;">Go Back</a>

    <div class="card" >
      
        <div class="card-body">

          <p class="card-text">
            <div class="row">
                <div class="col-md-8">
                  <h4 class="text-secondary">Description:</h4>
                    <h5 class="card-title mt-2">{{$quiz->description}}</h5>

                    <form method="GET" action="">
                      <div class="card mt-4">
                        <div class="card-body">
                          <th>
                            <h4 class="text-secondary mb-2">Filter:</h4>
                            <select name="filter" onchange="this.form.submit()">
                            <option value="desc">Filter Students</option>
                            <option @if(request()->get('filter')=="desc") selected @endif value="desc">Most successful to most unsuccessful</option>
                            <option  @if(request()->get('filter')=="asc") selected @endif value="asc">Least successful to most successful</option>
                            <option @if(request()->get('filter')=="passed") selected @endif value="passed">Only passed students</option>
                            <option @if(request()->get('filter')=="failed") selected @endif value="failed">Only failed students</option>
                            </select>
                            <input type="hidden">
                        </th>
                      
                          <ul class="list-group mt-4 " data-bs-spy="scroll">
                            @switch(request()->get('filter'))
                              @case('desc')
                              @foreach ($quiz->descResults as $result )
                              <img src="{{$result->user->profile_photo_path}}">
                              <li class="list-group-item d-flex justify-content-between align-items-center">{{$result->user->name}}
                              <span class="">{{$result->score}}</span>
                              </li>
                              @endforeach
                                @break
                              @case('asc')
                              @foreach ($quiz->ascResults as $result )
                              @if ($quiz->passing_score <= $result->score)
                              <li class="list-group-item d-flex justify-content-between align-items-center">{{$result->user->name}}
                              <span class="">{{$result->score}}</span>
                              </li>
                              @endif
                              @endforeach
                                @break
                              @case('passed')
                              @foreach ($quiz->descResults as $result )
                              @if ($quiz->passing_score <= $result->score)
                              <li class="list-group-item d-flex justify-content-between align-items-center bg-success text-white">{{$result->user->name}}
                                <span class="">{{$result->score}}</span>
                                </li>                                
                              @endif
                              @endforeach
                                @break
                              @case('failed')
                              @foreach ($quiz->descResults as $result )
                              @if ($quiz->passing_score > $result->score)
                              <li class="list-group-item d-flex justify-content-between align-items-center bg-danger text-white">{{$result->user->name}}
                                <span class="">{{$result->score}}</span>
                                </li>                                
                              @endif
                              @endforeach
                                @break
                              @default
                              @foreach ($quiz->descResults as $result )
                              <li class="list-group-item d-flex justify-content-between align-items-center">{{$result->user->name}}
                              <span class="">{{$result->score}}</span>
                              </li>
                              @endforeach
                            @endswitch


                          </ul>
                        </div>
                      </div>
                    </form>


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
                      @if ($quiz->my_result !==null)
                      <li class="list-group-item d-flex justify-content-between align-items-center ">
                        My Rank
                        <span class="">{{$quiz->my_rank}}</span>
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
          <a href="{{route('quiz.join', $quiz->slug)}}" class="btn btn-warning mt-2">View Answers</a>
          @elseif (!$quiz->my_result && $quiz->finished_at>now() || !$quiz->my_result && $quiz->finished_at==null )
          <a href="{{route('quiz.join', $quiz->slug)}}" class="btn btn-outline-primary mt-2">Take Quiz</a>
          @elseif(!$quiz->my_result && $quiz->finished_at<now())
          <button class="btn btn-danger mt-2" disabled>The date of this quiz has already passed</button>
          @endif
        </div>
      </div>

</x-app-layout>
