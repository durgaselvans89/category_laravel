@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2>Add Category</h2>
      </div>
      <br>
      <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('error') }}
                </div>
            @endif
      <form action="{{ route('category.store') }}" method="POST">
        <div class="col-md-12">
          <div class="float-right">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Cancel</a>
          </div>
        </div>
        <br/>
        <br/>
        <div class="col-md-12">  
          <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Category Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="title">Parent</label>
            <select class="form-control" id="parent_id" name="parent_id">
              <option value="0">No Parent</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="title">Sort Order *</label>
            <input type="number" class="form-control @error('sortorder') is-invalid @enderror" id="sortorder" name="sortorder">
            @error('sortorder')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status">
            <option value="1">Enabled</option>
            <option value="0">Disabled</option>
          </select>
          </div>
        </div>  
      </form>
      </div>
    </div>
</div>
@endsection
