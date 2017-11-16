@extends('admin.master')
@section('subContent')
  <form class="form" action="{{route('users.update', ['id' => $User->id])}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <input type="text" name="name" placeholder="name" value="{{$User->name}}">
      <input type="email" name="email" placeholder="email" value="{{$User->email}}">
      <input type="password" name="password" placeholder="password" value="">
      <input type="checkbox" name="is_admin" value="1"
      @if($User->is_admin)
        checked
      @endif
      >
      <input type="submit" name="" value="Update">
    </div>
  </form>
@endsection
