@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2>Edit Category</h2>
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
      <form action="{{ route('category.update', $category->id) }}" method="POST">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="col-md-12">
          <div class="float-right">
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
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$category->name}}">
            @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="title">Parent</label>
            <select class="form-control" id="parent_id" name="parent_id">
              <option value="0">No Parent</option>
              @foreach ($categories as $cat)
                <option value="{{$cat->id}}" @if($cat->id==$category->parent_id) selected @endif>{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="title">Sort Order *</label>
            <input type="number" class="form-control @error('sortorder') is-invalid @enderror" id="sortorder" name="sortorder" value="{{$category->sortorder}}">
            @error('sortorder')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status">
            <option value="1" @if($category->status == '1') selected @endif>Enabled</option>
            <option value="0" @if($category->status == '0') selected @endif>Disabled</option>
          </select>
          </div>
        </div>  
      </form>
      </div>
    </div>
</div>
@endsection