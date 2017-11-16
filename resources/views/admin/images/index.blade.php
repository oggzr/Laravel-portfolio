@extends('admin.master')
@section('subContent')
  <form class="" action="{{route('images.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <input type="file" name="file" value="">
      <input type="text" name="name" value="">
      <input type="submit" name="" value="Create">
    </div>
  </form>
  <table class="table">
    <thead>
      <th>Name</th>
      <th>Url</th>
      <th>Delete</th>
      <th>Edit</th>
    </thead>
    <tbody>
      @foreach ($Images as $Image)
        <tr>
          <td>{{$Image->name}}</td>
          <td>{{$Image->url}}</td>
          <td><a href="{{route('images.delete' , ['id' => $Image->id])}}">Delete</a></td>
          <td><a href="{{route('images.edit' , ['id' => $Image->id])}}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
