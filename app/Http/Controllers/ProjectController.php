<?php

namespace App\Http\Controllers;
use App\Image;
use App\Tag;
use App\Project;
use App\Comment;
use Illuminate\Http\Request;
use Session;

class ProjectController extends Controller
{

  //sending the user to the admin project page, with all the tags and images so the admin can create new projects

    public function showForm() {
      return view('admin.projects.form')->with('tags' , Tag::all())->with('images' , Image::all())->with('Projects' , Project::All());
    }

  //Sending the user to the selected project edit page with all the tags and images

    public function edit(Project $id) {
      return view('admin.projects.edit')->with('Project' , $id)->with('tags' , Tag::all())->with('images' , Image::all());
    }

  //Saves all the new data to a new project coming with the post request

    public function store() {

      $this->validate(request(), [
        'title' => 'max:25|required',
        'description' => 'max:2000|required',
        'image_id' => 'required'
      ]);

      $Project = new Project;


      $Project->title = request()->title;
      $Project->description = request()->description;
      $Project->image_id = request()->image_id;
      $Project->save();
      if (!empty(request()->tag_id)) {
      foreach (request()->tag_id as $id){
        $Project->Tags()->attach($id);
      }}
      $Image = Image::find(request()->image_id);
      $Image->project_id = $Project->id;
      $Image->save();
      Session::flash('success' , 'U created a new project');
      return redirect()->back();
    }

    //Deletes the selected project

    public function delete(Project $id) {
      $id->delete();
      Session::flash('delete' , 'U deleted this project');
      return redirect()->back();
    }

    //Updates the project with the new data from the edit page

    public function update(Project $id) {
      $this->validate(request(), [
        'title' => 'max:25|required',
        'description' => 'max:2000|required',
        'image_id' => 'required'
      ]);
      $Project = $id;
      $Project->title=request()->title;
      $Project->description=request()->description;
      $Project->image_id = request()->image_id;
      $Project->save();
      if (!empty(request()->tag_id)) {
        $Project->Tags()->sync(request()->tag_id);
      }
      $Image = Image::find(request()->image_id);
      $Image->project_id = $Project->id;
      $Image->save();
      Session::flash('success' , 'u have updated this project');
      return redirect()->route('projects.showForm');
    }

    //Sends the user to the to a single project page with all the related comments and paginate

    public function single($id) {
      $Comments = Comment::where('project_id' , $id)->latest()->paginate(3);
      $Project = Project::find($id);

      return view('single')->with('Comments' , $Comments)->with('Project' , $Project);
    }
}
