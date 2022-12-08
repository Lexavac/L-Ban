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

              <form class="forms-sample" action="{{ route('store-category') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="exampleInputName1">Book Name</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Category ID</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="category_id" placeholder="Category ID">
                </div>


                <button typye="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
