
<x-app-layout>
    <x-slot name="header">Add Student</x-slot>

    <div class="row">
        <div class="card" style="width: 20rem; height:15rem">

                <div class="form-group mt-3">
                    <h1 class="text-danger h5">Password should contain;</h1>
                    <h6 class="ml-4 mt-4">1- At least 8 characters.</h6>
                    <h6 class="ml-4 mt-4">2- Uppercase charachters. (A-Z)</h6>
                    <h6 class="ml-4 mt-4">3- Lowercase charachters. (a-z)</h6>
                    <h6 class="ml-4 mt-4">4- Numbers. (0-9)</h6>

                </div>
        </div>
        <div class= "col-6">
            <div class="card mx-auto" style="width: 30rem;">
                <div class = "card-body mx-auto " >
                    <a href="{{route('users.index')}}" class="btn btn-outline-warning " style="margin-bottom: 10px;">Go Back</a>
        
                    <form method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" style="margin-bottom: 10px; width: 18rem;" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" style="margin-bottom: 10px; width: 18rem;" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="form-group" style="width: 10rem;">
                            <label>Password *</label>
                            <input type="password" name="password" style="margin-bottom: 10px; width: 18rem;" class="form-control" value="{{old('password')}}">
                        </div>
        
                        <div class="form-group">
                            <label>Status</label>
                            <select name="type" style="margin-bottom: 20px; width: 18rem;" class="form-control">
                                <option @if(old('type')==='student') selected @endif value="student">Student</option>
                                <option @if(old('type')==='admin') selected @endif value="admin">Admin</option>
                            </select>    
                        </div>
        
                        <div class="form-group">
                            <button id="submit" type="submit" style="margin-top: 10px;" class="btn btn-outline-success">Add Student</button>
                        </div>
                </div>
            </div>
        </div>

    </div>
  

</x-app-layout>