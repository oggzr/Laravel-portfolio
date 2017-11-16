@extends('admin.master')
@section('subContent')
  <form class="" action="{{route('images.update' , ['id' => $Image->id])}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <input type="text" name="name" value="{{$Image->name}}">
      <input type="submit" name="" value="Create">
    </div>
  </form>
@endsection
