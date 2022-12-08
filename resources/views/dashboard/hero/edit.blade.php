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
              <h4 class="card-title">Create Data Categoey</h4>
              <p class="card-description"> Basic form elements </p>

              <form class="forms-sample" action="/hero-update/{{ $heros->id }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="exampleInputName1">Header</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="header" placeholder=" Header Name" value="{{ old('header', $heros->header) }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputName1">Sub Header</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="sub" placeholder="Sub Header Name"  value="{{ old('sub', $heros->sub) }}">
                  </div>

                  <div class="form-group">
                      <label for="exampleTextarea1">Description 1</label>
                      <textarea class="form-control" id="exampleTextarea1" placeholder="Description" name="desc1" rows="4"> {{ old('desc1', $heros->desc1) }}</textarea>
                    </div>

                  <div class="form-group">
                      <label for="exampleTextarea1">Description 2</label>
                      <textarea class="form-control" id="exampleTextarea1"  placeholder="Description" name="desc2" rows="4"> {{ old('desc2', $heros->desc2) }}</textarea>
                    </div>

                  <div class="form-group">
                      <label for="media">media</label>
                      <div class="needsclick dropzone" id="media-dropzone"></div>
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
    var uploadedmediaMap = {}
 Dropzone.options.mediaDropzone = {
     url: "{{ route('storeImages') }}",
     maxFilesize: 10, // MB
     maxFiles: 1,
     acceptedFiles: '.jpeg,.jpg,.png,.gif',
     addRemoveLinks: true,
     headers: {
       'X-CSRF-TOKEN': "{{ csrf_token() }}"
     },
     success: function (file, response) {
       $('form').append('<input type="hidden" name="media[]" value="' + response.name + '">')
       uploadedmediaMap[file.name] = response.name
     },
     removedfile: function (file) {
       file.previewElement.remove()
       var name = ''
       if (typeof file.file_name !== 'undefined') {
         name = file.file_name
       } else {
         name = uploadedmediaMap[file.name]
       }
       $('form').find('input[name="media[]"][value="' + name + '"]').remove()
     },
     init: function () {

 @if(isset($books) && $books->media)
       var files =
         {!! json_encode($books->media) !!}
           for (var i in files) {
           var file = files[i]
           this.options.addedfile.call(this, file)
           this.options.thumbnail.call(this, file, file.original_url)
           file.previewElement.classList.add('dz-complete')
           $('form').append('<input type="hidden" name="media[]" value="' + file.file_name + '">')
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


