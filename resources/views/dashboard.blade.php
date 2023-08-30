<x-app-layout>
    <x-slot name="header">
        Main Page
    </x-slot>

    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
                @foreach ( $quizzes as $quiz )
                    
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$quiz->title}}</h5>
                    <small>{{$quiz->finished_at ? $quiz->finished_at : null}}</small>
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
        <div class="col-md-4">My Scores</div>
    </div>

</x-app-layout>
