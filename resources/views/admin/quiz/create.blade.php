
<x-app-layout>
    <x-slot name="header">Create Quiz</x-slot>

    <div class="card">

        <div class = "card-body">
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
                <div class="form-group">
                    <input id="isFinished" style="margin-bottom: 10px;" type="checkbox">
                    <label>Do you want to add an ending date?</label>
                </div>
                
                <div id="endingDate" style="display: none" class="form-group">
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