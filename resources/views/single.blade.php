@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-xs-3">
    </div>

  <div class="col-xs-6 text-center project_box lala" style="padding:20px;">
    <div class="content">
      <img class="single" src="{{$Project->Image['url']}}" alt="">
      <h2>{{$Project->title}}</h2>
      <p class="desc">{{$Project->description}}</p>
    </div>
      <ul class="tags">
          @foreach ($Project->tags as $tag)
              <li style="float:left;list-style:none;margin-right:10px;">{{$tag->title}}<div style="background-color:{{$tag->color}};width:12px;height:12px;border-radius:20px;display:inline-block;margin-left:5px;"></div></li>
          @endforeach
      </ul>
          <br>
          <h3>COMMENTS</h3>
          @foreach ($Comments as $Comment)
            <div class="comment">
              @admin
              <a class="icon" href="{{route('comments.delete',['id' => $Comment->id])}}"><span class="glyphicon glyphicon-remove"></span></a>
              @endadmin
              <h4>{{$Comment->User->name}}</h4>
              <span>{{$Comment->created_at->diffForHumans()}}</span>
              <p>{{$Comment->text}}</p>
            </div>
          @endforeach
          {{$Comments->links()}}

      @auth
      <form class="" action="{{route('comments.store' , ['project_id' => $Project->id])}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <textarea name="text" rows="8" cols="80"></textarea>
          <br>
          <input type="submit" class="btn btn-primary" value="Comment">
        </div>
      </form>
    @endauth
    @guest
      <div class="comments-guest">
        Register to be able to comment
      </div>
    @endguest
  </div>
  <div class="col-xs-3">
  </div>
  </div>
@endsection
