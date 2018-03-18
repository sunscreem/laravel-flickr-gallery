<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />
    
    <title>Photo Gallery</title>

</head>
<body>

    <div class="container">
        <h1>Recent Flickr Photos</h1>
    
        <div class="row mt-4">
            @foreach(\Sunscreem\LaravelFlickrGallery\FlickrPhoto::all()->take(64) as $photo)
                <div class="col-2 mb-3">
                    <a href="{{ $photo->src }}" data-featherlight="image">
                        <img src="{{ $photo->thumbsrc }}" alt="{{ $photo->caption }}" class="img-fluid img-thumbnail">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
