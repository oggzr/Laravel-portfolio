@extends('admin.master')
@section('subContent')
  <form class="form" action="{{route('users.store')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <input type="text" name="name" placeholder="name" value="">
      <input type="email" name="email" placeholder="email" value="">
      <input type="password" name="password" placeholder="password" value="">
      <label for="is_admin">Admin</label>
      <input type="checkbox" name="is_admin" value="1">
      <input type="submit" name="" value="Update">
    </div>
  </form>
  <table class="table">
    <thead>
      <th>Name</th>
      <th>email</th>
      <th>Admin?</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <tbody>
      @foreach ($Users as $User)
        <tr>
          <td>{{$User->name}}</td>
          <td>{{$User->email}}</td>
          <td>
            @if($User->is_admin === 0)
              No
            @else
              Yes
            @endif
          </td>
          <td><a href="{{route('users.edit' , ['id' => $User->id])}}">Edit</a></td>
          <td><a href="{{route('users.delete', ['id' => $User->id])}}">Delete</a></td>

        </tr>
      @endforeach
    </tbody>

  </table>
@endsection
