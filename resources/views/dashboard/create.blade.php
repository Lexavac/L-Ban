@extends('layouts.dashboard-main')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Form elements </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Create Data Book</h4>
              <p class="card-description"> Basic form elements </p>

              <form class="forms-sample" action="{{ route('store') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="exampleInputName1">Book Name</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Quantity</label>
                  <input type="number" class="form-control" id="exampleInputName1" name="price" placeholder="Quantity">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Desc</label>
                    <textarea class="form-control" id="exampleTextarea1" name="desc" rows="4"></textarea>
                  </div>

                <div class="form-group">
                  <label for="exampleSelectGender">Publisher</label>
                  <select name="publisher_id" class="form-control">
                    @foreach($categories as $id => $categoryName)
                    <option value="{{ $id }}">{{ $categoryName }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select name="tags[]" class="form-control" multiple>
                        @foreach($tags as $id => $tagName)
                        <option value="{{ $id }}">{{ $tagName }}</option>
                    @endforeach
                    </select>

                <div class="form-group">
                    <label for="gallery">Gallery</label>
                    <div class="needsclick dropzone" id="gallery-dropzone"></div>
                    </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
@push('style-alt')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('js-alt')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
    var uploadedGalleryMap = {}
 Dropzone.options.galleryDropzone = {
     url: "{{ route('storeImages') }}",
     maxFilesize: 10, // MB
     maxFiles: 4,
     acceptedFiles: '.jpeg,.jpg,.png,.gif',
     addRemoveLinks: true,
     headers: {
       'X-CSRF-TOKEN': "{{ csrf_token() }}"
     },
     success: function (file, response) {
       $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
       uploadedGalleryMap[file.name] = response.name
     },
     removedfile: function (file) {
       file.previewElement.remove()
       var name = ''
       if (typeof file.file_name !== 'undefined') {
         name = file.file_name
       } else {
         name = uploadedGalleryMap[file.name]
       }
       $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
     },
     init: function () {

 @if(isset($book) && $book->gallery)
       var files =
         {!! json_encode($book->gallery) !!}
           for (var i in files) {
           var file = files[i]
           this.options.addedfile.call(this, file)
           this.options.thumbnail.call(this, file, file.original_url)
           file.previewElement.classList.add('dz-complete')
           $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
         }
 @endif
     },
      error: function (file, response) {
          if ($.type(response) === 'string') {
              var message = response //dropzone sends it's own error messages in string
          } else {
              var message = response.errors.file
          }
          file.previewElement.classList.add('dz-error')
          _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
          _results = []
          for (_i = 0, _len = _ref.length; _i < _len; _i++) {
              node = _ref[_i]
              _results.push(node.textContent = message)
          }
          return _results
      }
 }
 </script>

    @endpush

