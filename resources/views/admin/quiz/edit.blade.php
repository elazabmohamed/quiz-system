
<x-app-layout>
    <x-slot name="header">Update Quiz</x-slot>

    <div class="card">

        <div class = "card-body">
            <form method="POST" action="{{route('quizzes.update', $quiz->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Quiz Title *</label>
                    <input type="text" name="title" style="margin-bottom: 10px;" class="form-control" value="{{$quiz->title}}">
                </div>
                <div class="form-group">
                    <label>Quiz Description</label>
                    <textarea name="description" style="margin-bottom: 10px;" class="form-control" rows="4">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <input id="isFinished" style="margin-bottom: 10px;" @if($quiz->finished_at) checked @endif type="checkbox">
                    <label>Do you want to add an ending date?</label>
                </div>
                
                <div id="endingDate" @if(!$quiz->finished_at)  style="display: none" @endif class="form-group" >
                    <label>Ending Date</label>
                    <input type="datetime-local" name="finished_at"  @if($quiz->finished_at) value="{{date('Y-m-d\TH:i', strtotime($quiz->finished_at))}}" @endif class=form-control>
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" style="margin-top: 10px;" class="btn btn-outline-success">Update Quiz</button>
                </div>
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