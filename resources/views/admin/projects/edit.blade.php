@extends('admin.master')
@section('subContent')
  <form class="" action="{{route('projects.update', ['id' => $Project->id])}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <input type="text" name="title" placeholder="title" value="{{$Project->title}}">
      <textarea name="description" rows="8" cols="80" placeholder="description">{{$Project->description}}</textarea>
      <label for="tag">Tag</label>
      <select name="tag_id[]" multiple>
        @foreach ($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
      </select>
      <label for="image_id">Image</label>
      <select name="image_id">
        @foreach ($images as $image)
          <option value="{{$image->id}}">{{$image->name}}</option>
        @endforeach
      </select>
      <input type="submit" name="" value="Create">
    </div>

  </form>
@endsection
