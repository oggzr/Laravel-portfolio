@extends('layouts.app')
@section('content')

        <div class="container-fluid admin">
          <div class="row">
            <div class="col-lg-4">
              <ul class="list-group">
                <li class="list-group-item">
                  <a href="{{route('projects.showForm')}}">Projects</a>
                </li>
                <li class="list-group-item">
                  <a href="{{route('tags.all')}}">Tags</a>
                </li>
                <li class="list-group-item">
                  <a href="{{route('images.all')}}">Images</a>
                </li>
                <li class="list-group-item">
                  <a href="{{route('users.all')}}">Users</a>
                </li>
                <li class="list-group-item">
                  <a href="{{route('export')}}">Export</a>
                </li>

              </ul>
            </div>

            <div class="col-lg-8">
              @yield('subContent')
            </div>
          </div>

        </div>
    </div>
@endsection
