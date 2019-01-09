@extends('admin.base')

@section('content')
<div class="container-fluid">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admin.profile') }}">Profile</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center">Add Profile</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      @endif
    </div>
    <div class="col-md-12">
      <form action="{{ route('admin.handleAddProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="fullname">(*) Fullname</label>
          <input type="text" id="fullname" class="form-control" name="fullname">
        </div>
        <div class="form-group">
          <label for="nickname"> Nickname</label>
          <input type="text" id="nickname" class="form-control" name="nickname">
        </div>
        <div class="form-group">
          <label for="email">(*) Email</label>
          <input type="text" id="email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="avatar"> Avatar </label>
          <input type="file" id="avatar" name="avatar">
        </div>
        <div class="form-group">
          <label for="phone">(*) Phone</label>
          <input type="text" id="phone" class="form-control" name="phone">
        </div>
        <div class="form-group">
          <label for="address">(*) Address</label>
          <input type="text" id="address" class="form-control" name="address">
        </div>
        <div class="form-group">
          <label for="date">(*) Date</label>
          <input type="date" id="date" class="form-control" name="date">
        </div>
        <div class="form-group">
          <label for="gender">(*) Gender</label>
          <select class="form-control" name="gender" id="gender">
            <option value="1"> Nam </option>
            <option value="0"> Nu </option>
          </select>
        </div>
        <div class="form-group">
          <label for="single">(*) Single</label>
          <select class="form-control" name="single" id="single">
            <option value="1"> Doc than </option>
            <option value="0"> Co gia dinh </option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">(*) Description</label>
          <textarea class="form-control" name="description" id="description" rows="8"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="addProfile"> Save + </button>
      </form>
    </div>
  </div>
</div>
@endsection