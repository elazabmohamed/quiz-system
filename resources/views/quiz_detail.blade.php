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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Passing Score
                          <span class="">{{$quiz->passing_scor }}</span>
                        </li>
                      </ul>
                </div>
            </div>
          </p>
          <a href="#" class="btn btn-outline-primary mt-2">Take Quiz</a>
        </div>
      </div>

</x-app-layout>
