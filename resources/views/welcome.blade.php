@extends('app')

@section('content')
<div class="mt-5 md:mt-0 md:col-span-2">

    <form action="{{route('mediaupload.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Upload Video
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                        aria-hidden="true">
                        <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file-upload"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>
        </div>
</div>
<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
    <button type="submit"
        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Upload
    </button>
</div>
</form>
</div>

<div class="grid grid-cols-3 gap-2">
    @foreach ($uploads as $upload)
    <div class="container mx-auto">
        <video id="my_video" width="400" controls autoplay>
            <source src="storage/{{ $upload->filename }}" type="video/mp4">
            Your browser does not support HTML video.
        </video>
        <div id="video_controls_bar">
            <button id="playpausebtn" onclick="playPause(this, 'my_video')">Pause</button>
            <button id="delete">Delete</button>
        </div>
    </div>
    @endforeach
</div>


@endsection

<script>
    $(document).ready(function() {
alert("document ready occurred!");
});
    /*    function playPause(btn,vid){
        var vid = document.getElementById(vid);
        if(vid.paused){
vid.play();
btn.innerHTML="pause";
        }else{
vid.pause();
btn.innerHTML="play";
        }
    } 
      
    var video_id;
    $(document).on('click', '#delete', function(){
        alert('delete button pressed');
video_id = $(this).attr('id');

$.ajax({
    url:"/mediaupload/destroy/"+video_id,
    beforeSend:function(){
        alert('woow')
    },
    success:function(data)
})
    });    */

/*
$(window).load(function() {
alert("window load occurred!");
});  */
</script>

<style type="text/css">
    div#video_controls_bar {
        background: #333;
        padding: 10px;
        width: 400px;

    }

    #delete {
        color: white
    }

    #playpausebtn {
        color: aliceblue
    }
</style>