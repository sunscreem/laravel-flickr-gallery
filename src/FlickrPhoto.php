<?php

namespace Sunscreem\LaravelFlickrGallery;

use Illuminate\Database\Eloquent\Model;

class FlickrPhoto extends Model
{
    protected $fillable = ['flickr_id', 'caption', 'created_at', 'src', 'thumbsrc'];
}
