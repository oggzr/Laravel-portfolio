<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{

    // Saves incoming post data to a new Comment also adds the user id for the realationship so the user can be displayed in frontend
    public function store($project_id) {
      $id = Auth::user()->id;
      $Comment = new Comment;
      $Comment->text = request()->text;
      $Comment->user_id = $id;
      $Comment->project_id = $project_id;
      $Comment->save();
      return redirect()->back();
    }

    //Removes the selected Comment with the id sent with the url

    public function delete($id) {
      $Comment = Comment::find($id);
      $Comment->delete();
      return redirect()->back();
    }
}
