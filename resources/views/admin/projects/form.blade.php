@extends('admin.master')
@section('subContent')
  <form class="" action="{{route('projects.store')}}" method="post" class="form">
    {{csrf_field()}}
    <div class="form-group">
      <input type="text" name="title" placeholder="title">
    </div>
    <div class="form-group">
      <textarea name="description" rows="8" cols="80" placeholder="description"></textarea>
    </div>
    <div class="form-group">
      <label for="tag">Tags</label>
      <select name="tag_id[]" multiple>
        @foreach ($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="image_id">Image</label>
      <select name="image_id">
        @foreach ($images as $image)
          <option value="{{$image->id}}">{{$image->name}}</option>
        @endforeach
      </select>
    </div>

      <input type="submit" class="btn btn-success" name="" value="Create">
    </div>

  </form>
  <table class="table">
    <thead>
      <th>Title</th>
      <th>description</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Delete</th>
      <th>Edit</th>
    </thead>
    <tbody>
      @foreach ($Projects as $Project)

        <tr>
          <td>{{$Project->title}}</td>
          <td>{{$Project->description}}</td>
          <td>{{$Project->Image['name']}}</td>

          <td>
            @foreach ($Project->Tags as $tag)
              {{$tag->title}}
            @endforeach
          </td>
          <td><a href="{{route('projects.delete', ['id' => $Project->id])}}">Delete</a></td>
          <td><a href="{{route('projects.edit', ['id' => $Project->id])}}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
