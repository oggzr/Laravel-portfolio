@extends('admin.master')
@section('subContent')
  <ul>
    <li><a href="{{route('export.image')}}">Export Image Database</a></li>
    <li><a href="{{route('export.project')}}">Export Project Database</a></li>
    <li><a href="{{route('export.tag')}}">Export Tag Database</a></li>
    <li><a href="{{route('export.user')}}">Export User Database</a></li>
  </ul>
@endsection
