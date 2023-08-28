<x-app-layout>
    <x-slot name="header">
        "{{$quiz->title}}" Questions
    </x-slot>
    <a href="{{route('questions.create', $quiz->id)}}" class="btn btn-outline-primary" style="margin-bottom: 10px;">Add a question</a>
    <div class="card">
        
        <div class = "card-body">
            <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th scope="col">Question</th>
                    <th scope="col">1. Answer</th>
                    <th scope="col">2. Answer</th>
                    <th scope="col">3. Answer</th>
                    <th scope="col">4. Answer</th>
                    <th scope="col">Correct Answer</th>
                    <th scope="col" style="width: 8rem;">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td class="text-success">{{substr($question->correct_answer,-1)}}. Answer</td>
                        <td>
                            <a href="{{route('questions.edit', [$quiz->id, $question->id])}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{route('questions.destroy',[$quiz->id, $question->id])}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>

                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    


</x-app-layout>
