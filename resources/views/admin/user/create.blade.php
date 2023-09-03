
<x-app-layout>
    <x-slot name="header">Add Student</x-slot>

    <div class="card mx-auto" style="width: 25rem;">
        
        <div class = "card-body mx-auto" >
            <a href="{{route('users.index')}}" class="btn btn-outline-primary " style="margin-bottom: 10px;">Go Back</a>

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

</x-app-layout>