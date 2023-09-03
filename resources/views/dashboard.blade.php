<x-app-layout>
    <x-slot name="header">
        Main Page
    </x-slot>

    <div class="row">
        <div class="col-md-8">
          <div class="card">

          <div class="card-header bg-secondary text-white">Active Quizzes</div>
            <div class="list-group">


                @foreach ( $quizzes as $quiz )
                <a href="{{route('quiz.detail', $quiz->slug)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$quiz->title}}</h5>
                    @if ($quiz->finished_at && $quiz->finished_at>now())
                      <small>{{$quiz->finished_at}}</small>
                    @elseif($quiz->finished_at && $quiz->finished_at<now())
                      <small class="bg-danger text-white px-2">{{$quiz->finished_at}} [Passed]</small>
                    @elseif(!$quiz->finished_at)
                      <small class="bg-secondary text-white px-2">No date added</small>
                    @endif
                  </div>
                  <p class="mb-1">{{ Str::limit($quiz->description, 200)}}</p>
                  <small class="float-right">{{$quiz->duration}} min</small>

                  <small>{{$quiz->questions_count}} Questions</small>
                </a>
                @endforeach
                <div class="mt-2">
                    {{$quizzes->links()}}
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">My Scores</div>
            <ul class="list-group list-group-flush">
              @foreach ($results as $result )
              <li class="list-group-item link-primary"><a href="{{route('quiz.detail', $result->quiz->slug)}}">{{$result->quiz->title}} 
                <strong class="float-right">{{$result->score}}</strong>

              </li>

              @endforeach
            </ul>
          </div>
        </div>
    </div>

</x-app-layout>
