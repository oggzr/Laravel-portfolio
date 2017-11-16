<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;
use Session;

class ImageController extends Controller
{

    //sends the user to the Image admin page with all the Images

    public function showAll() {
      return view('admin.images.index')->with('Images' , Image::all());
    }

    //Stores the incoming data from a post request as a new Image

    public function store() {
      $this->validate(request() , [
        'name' => 'required|max:12',
        'file' => 'mimes:jpeg,jpg,png | max:1000',
      ]);
      $Image = new Image;
      $Image->url=asset(request()->file->store('image'));
      $Image->name=request()->name;
      $Image->save();
      Session::flash('success' , 'U uploaded a image');
      return redirect()->back();
    }

    //Sends the user to the selected Image edit page

    public function edit(Image $id) {
      return view('admin.images.edit')->with('Image' , $id);
    }

    //Updates the selected information from the edit page

    public function update(Image $id) {
      $this->validate(request() , [
        'name' => 'required|max:12'
      ]);
      $id->name=request()->name;
      $id->save();
      Session::flash('success' , 'U updated this image');
      return redirect()->route('images.all');
    }

    //Deletes the selected Image

    public function delete(Image $id) {
      $id->delete();
      Session::flash('delete' , 'Delete succesfull');
      return redirect()->back();
    }
}
