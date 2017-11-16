<?php

namespace App;
use App\User;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  // make relation for each comment to one project

    public function Project () {
      return $this->belongsTo(Project::class);
    }

    // Each user relation towards each comment

    public function User (){
      return $this->belongsTo(User::class);
    }
}
