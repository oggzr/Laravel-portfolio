@extends('admin.master')
@section('subContent')
<form class="" action="{{route('tags.update', ['id' => $Tag->id])}}" method="post">
  {{csrf_field()}}
  <input type="text" name="title" value="{{$Tag->title}}" placeholder="title">
  <input type="color" name="color" value="{{$Tag->color}}" placeholder="color">
  <input type="submit" name="" value="Update">
</form>
@endsection
