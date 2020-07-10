@extends('layouts.app')
@section('content')
<script>
  function checkAll(bx){
    var form = bx.form;
    var ischecked = bx.checked;
    for (var i = 0; i < form.length; ++i) {
        if (form[i].type == 'checkbox') {
            form[i].checked = ischecked;
        }
    }
}
</script>
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Category List</h2>
        </div>
        
        <br>
        <div class="col-md-12">
        <form  method="post" action="{{action('CategoryController@destroy',1)}}">
          {{csrf_field()}}
          <input name="_method" type="hidden" value="DELETE">
          <div class="col-md-12">
              <div class="float-right">
                  <a href="{{ route('category.create') }}" class="btn btn-outline-danger"><i class="fa fa-plus"></i> Add Category</a>
                  <button class="btn btn-outline-danger" type="submit">Delete</button>
              </div>
          </div>
          <br>
          <br>    
          <div class="col-md-12">
              @if (session('success'))
                  <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                  </div>
              @endif
              @if (session('error'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('error') }}
                  </div>
              @endif
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th width="5%"><input type="checkbox" name="checkbox[]" value="all" onclick="checkAll(this)"/></th>
                    <th>Category Name</th>
                    <th width="10%"><center>Sort order</center></th>
                    <th width="14%"><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($categories as $category)
                      <tr>
                      <th><input type="checkbox" name="checkbox[]" value="{{ $category->id }}"/></th>
                      <td>{{ $category->name }}</td>
                      <td><center>{{ $category->sortorder }}</center></td>
                      <td>
                        <div class="action_btn">
                          <div class="action_btn">
                            <a href="{{ route('category.edit', $category->id)}}" class="btn">Edit</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @empty
                      <tr>
                      <td colspan="4"><center>No data found</center></td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              {{ $categories->links() }}
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
