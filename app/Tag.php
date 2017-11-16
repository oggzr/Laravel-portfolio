<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title' , 'color'];

    //Tags can have many projects

    public function Projects() {
      return $this->belongsToMany(Project::class);
    }
}
