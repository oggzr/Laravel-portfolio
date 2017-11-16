<?php

namespace App;
use App\Tag;
use App\Image;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title' , 'description' , 'image_id'];

    //Many to many relationship for tags and projects

    public function Tags() {
      return $this->belongsToMany(Tag::class);
    }

    //Each project has one image

    public function Image() {
      return $this->hasOne(Image::class);
    }

    //each project has many comments

    public function Comments() {
      return $this->hasMany(Comment::class);
    }
}
