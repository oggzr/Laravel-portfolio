@extends('admin.master')
@section('subContent')
  <form class="" action="{{route('uploads')}}" enctype="multipart/form-data" method="post">
    <input type="file" name="file[]" value="" multiple>
    <input type="submit" class="btn btn-success" name="" value="">
  </form>
@endsection
