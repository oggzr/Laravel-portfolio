<?php

namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url'];

// Each project can have 1 Image

    public function Project(){
      return $this->belongsTo(Project::class);
    }
}
