@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <h1>My Account</h1>
      <form class="form" action="{{route('user.edited')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" name="name" placeholder="name" value="{{$User->name}}">
          <input type="email" name="email" placeholder="email" value="{{$User->email}}">
          <input type="password" name="password" placeholder="">
          <input type="submit" name="" value="Update">
        </div>
      </form>
    </div>

  </div>

@endsection
