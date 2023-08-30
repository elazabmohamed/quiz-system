<x-app-layout>
    <x-slot name="header">
        Quizzes
    </x-slot>
    <div class="card">
        
      <div class = "card-body">
        <a href="{{route('quizzes.create')}}" class="btn btn-outline-primary float-right" style="margin-bottom: 10px;">Create Quiz</a>

          <form method="GET" action="">
            <table>
              <thead>
                <tr>
                  <th><input type="text" name="title" value="{{request()->get('title')}}" placeholder="Search Quiz" class="form-control"></th>
                  <th>
                    <select  name="status" onchange="this.form.submit()">
                    <option value="">Select Status</option>
                    <option @if(request()->get('status')=="active") selected @endif value="active">Active</option>
                    <option @if(request()->get('status')=="passive") selected @endif value="passive">Passive</option>
                    <option @if(request()->get('status')=="draft") selected @endif value="draft">Draft</option>
                    </select>
                </th>
                <th><a href="{{route('quizzes.index')}}" class="btn btn-secondary">Clear</th>
                </tr>
              </thead>
            </table>
          </form>

            <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th scope="col">Quiz Title</th>
                    <th scope="col">Question Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Passing Score</th>
                    <th scope="col" style="width: 3rem;">Status</th>
                    <th scope="col" style="width: 13rem;">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz )
                    <tr>
                        <td>{{$quiz->title}}</td>
                        <td>{{$quiz->questions_count}}</td>
                        <td>{{$quiz->finished_at}}</td>
                        <td>{{$quiz->duration}} min</td>
                        <td>{{$quiz->passing_score}}</td>
                        <td>
                          @switch($quiz->status)
                            @case('active')
                              <span class="btn btn-sm btn-success">Active</span>
                            @break
                            @case('passive')
                              <span class="btn btn-sm btn-secondary">Passive</span>
                            @break
                            @case('draft')
                              <span class="btn btn-sm btn-warning">Draft</span>
                            @break
                          @endswitch
                        </td>
                        <td>
                            <a href="{{route('quizzes.edit', $quiz->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{route('questions.index', $quiz->id)}}" class="btn btn-sm btn-info">Questions</a>
                            <a href="{{route('quizzes.destroy', $quiz->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        
              {{$quizzes->withQueryString()->links()}}
        </div>
    </div>
    


</x-app-layout>
