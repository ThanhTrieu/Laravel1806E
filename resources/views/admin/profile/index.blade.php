@extends('admin.base')

@section('content')
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Profile</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center">This is Profile</h3>
      <h3 class="text-center">{{ $mess }}</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('admin.formAddProfile') }}" class="btn btn-primary"> Add + </a>
    </div>
  </div>
</div>
@endsection