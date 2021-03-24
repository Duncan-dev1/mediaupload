@extends('app')

@section('content')




<div class="row">
    @foreach ($uploads as $upload)
    <div class="col-4">

        <video width="400" controls>
            <source src="storage/{{ $upload->filename }}" type="video/mp4">

            Your browser does not support HTML video.
        </video>

    </div>
    @endforeach
</div>









@endsection