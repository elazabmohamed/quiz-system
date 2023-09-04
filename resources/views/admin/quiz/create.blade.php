
<x-app-layout>
    <x-slot name="header">Create Quiz</x-slot>

    <div class="card">
        

        <div class = "card-body">
            <a href="{{route('quizzes.index')}}" class="btn btn-outline-warning " style="margin-bottom: 10px;">Go Back</a>


            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf
                <div class="form-group">
                    <label>Quiz Title *</label>
                    <input type="text" name="title" style="margin-bottom: 10px;" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>Quiz Description</label>
                    <textarea name="description" style="margin-bottom: 10px;" class="form-control" rows="4">{{old('description')}}</textarea>
                </div>
                <div class="form-group" style="width: 10rem;">
                    <label>Passing Score *</label>
                    <input  type="number" name="passing_score" min="1" max="100" placeholder="%" style="margin-bottom: 10px;" class="form-control" value="{{old('passing_score')}}">
                </div>
                <div class="form-group" style="width: 10rem;">
                    <label>Duration *</label>
                    <input  type="number" name="duration" min="1" max="500" placeholder="min" style="margin-bottom: 10px;" class="form-control" value="{{old('passing_score')}}">
                </div>

                <div class="form-group">
                    <input id="isFinished" style="margin-bottom: 10px;" @if(old('finished_at')) checked @endif type="checkbox">
                    <label>Do you want to add an ending date?</label>
                </div>
                
                <div id="endingDate" @if(!old('finished_at'))  style="display: none" @endif class="form-group" >
                    <label>Ending Date</label>
                    <input type="datetime-local" name="finished_at" class=form-control value="{{old('finished_at')}}">
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" style="margin-top: 10px;" class="btn btn-outline-success">Add Quiz</button>
                </div>
        </div>
    </div>
    <script src="/assets/jquery.js"></script>


        <script>
            $('#isFinished').change(function(){
                //alert("it's working.");
                if($('#isFinished').is(':checked')){
                    $('#endingDate').show();
                }else{
                    $('#endingDate').hide();
                }
            });
        </script>


</x-app-layout>