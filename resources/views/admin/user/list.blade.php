<x-app-layout>
    <x-slot name="header">
        Quizzes
    </x-slot>
    <div class="card">
        
      <div class = "card-body">
        <a href="{{route('users.create')}}" class="btn btn-outline-primary float-right" style="margin-bottom: 10px;">Add Student</a>

          <form method="GET" action="">
            <table>
              <thead>
                <tr>
                  <th><input type="text" name="studentName" value="{{request()->get('studentName')}}" placeholder="Search Student" class="form-control"></th>
                <th><a href="{{route('users.index')}}" class="btn btn-secondary">Clear</th>
                </tr>
              </thead>
            </table>
          </form>

            <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col" style="width:8rem;">Options</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{route('users.destroy', $user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        
              {{$users->withQueryString()->links()}} 
        </div>
    </div>
    


</x-app-layout>
