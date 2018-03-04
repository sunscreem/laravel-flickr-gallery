<?php

namespace Sunscreem\LaravelFlickrGallery\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{
    public static function create(string $reason) : self
    {
        return new static($reason);
    }
}
