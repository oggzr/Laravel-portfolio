@extends('layouts.app')
@section('content')
    <div class="row">
      @foreach ($Projects as $Project)
          @if($loop->index % 3 === 0)
              <div class="clearfix"></div>
          @endif
          <div class="col-xs-4 text-center project_box" style="padding:40px;">
              <div class="content jibbedish">


              <img src="{{$Project->Image['url']}}" alt="" class="single">
              <a class="read" href="{{route('project', ['id' => $Project->id])}}"><h2>{{$Project->title}}</h2></a>
              </div>

          </div>
      @endforeach
    </div>


@endsection
