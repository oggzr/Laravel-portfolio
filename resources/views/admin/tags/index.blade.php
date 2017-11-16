@extends('admin.master')
@section('subContent')
  <form class="" action="{{route('tags.store')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="title" value="" placeholder="title">
    <input type="color" name="color" value="" placeholder="color">
    <input type="submit" name="" value="Create">
  </form>
  <table class="table">
    <thead>
      <th>Title</th>
      <th>Color</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <tbody>
      @foreach ($Tags as $Tag)
        <tr>
          <th>{{$Tag->title}}</th>
          <th>{{$Tag->color}}</th>
          <th><a href="{{route('tags.edit' , ['id' => $Tag->id])}}">Edit</a></th>
          <th><a href="{{route('tags.delete' , ['id' => $Tag->id])}}">Delete</a></th>
        </tr>
      @endforeach
    </tbody>
  </table>



@endsection
