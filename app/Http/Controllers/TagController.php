<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{

    // Sends the user to the admin tag page with all the tags

    public function showAll() {
      return view('admin.tags.index')->with('Tags' , Tag::all());
    }

    //Stores the data from the post request into a new Tag

    public function store() {
      $this->Validate(request(),[
        'title' => 'required|max:10'
      ]);
      $Tag = new Tag;
      $Tag->title=request()->title;
      $Tag->color=request()->color;
      $Tag->save();
      Session::flash('success','U created a new Tag');
      return redirect()->back();
    }

    //sends the user to the selected tag's edit page

    public function edit(Tag $id) {

      return view('admin.tags.edit')->with('Tag' , $id);
    }

    //Updates the selected tag with the new data coming from a post request from the edit page

    public function update(Tag $id) {
      $this->Validate(request(),[
        'title' => 'required|max:10'
      ]);
      $id->title = request()->title;
      $id->color = request()->color;
      $id->save();
      Session::flash('success' , 'u updated this Tag');
      return redirect()->route('tags.all');
    }

    // Deletes a selected tag 

    public function delete(Tag $id) {
      $id->delete();
      Session::flash('success' , 'u deleted this Tag');
      return redirect()->back();
    }
}
