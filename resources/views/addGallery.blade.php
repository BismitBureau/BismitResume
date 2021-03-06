@extends('layouts.masterlogin')

@section('content')
<div class="container">
</div>

<div class="container text-center mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 self-align-center">
            <h3>ADD PHOTO TO GALLERY</h3>
        </div>
    </div>
    <div class="row">
    
        <div class="col">
            <div class="mt-5 align-self-start">
                <strong><p>Title</p></strong>
            </div>
            <div class="form-group">
                <input type="title" class="form-control" id="inputTitle">
            </div>
            <div class="mt-2 align-self-start">
                <strong><p>Description</p></strong>
            </div>
            <div class="input-group">
                <textarea class="form-control" aria-label="With textarea" rows="5"></textarea>
            </div>
        </div>

    <form action="/galleries" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row"> 
            <div class="col">
                <div class="form-group mt-5">
                    <label for="inputTitle"><strong>Title</strong></label>
                    <input type="title" class="form-control" id="inputTitle" name="title">
                </div>
                <div class="mt-2 align-self-start">
                    <strong><p>Description</p></strong>
                </div>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" rows="5" name="desc"></textarea>
                </div>
            </div>

            <div class="col">
                <div class="mt-5 align-self-start">
                    <strong><p>AddPhoto</p></strong>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputFile" name="photo">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label for="inputLink"><strong>Link</strong></label>
                    <input type="link" class="form-control" id="inputLink" name="link">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-g self-align-center">
                <button type="submit" class="btn btn-link btn-sm">        
                    <img class="img-responsive mt-4" style="max-width:140px;" src="{{asset('images/buttonSubmit.svg')}}" alt="">
                </button>
            </div>
        </div>
    </form>
    
</div>




@endsection