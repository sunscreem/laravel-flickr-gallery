<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.6.3/css/justifiedGallery.min.css" />
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" />
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.gallery.min.css" />

    <title>Simple One Page Photo Gallery</title>

    <style>
        
        /* used when showing the captions when an image is clicked/tapped */
        .caption {
            position: relative;
            bottom: 5vh;
            height: 5vh;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            text-align: center;
            padding-top: 1vh;
        }


        /* workaround for scroll bars appearing because of captions showing */
        .featherlight .featherlight-content {

            overflow: hidden !important;
        }
        
    </style>

</head>
<body>

    <div class="container">

        <h1 class="m-4 text-center">Recent Flickr Photos</h1>
    
        <div id="photoGallery" 
             data-featherlight-gallery
             data-featherlight-filter="a">

                @foreach(\Sunscreem\LaravelFlickrGallery\FlickrPhoto::take(64)->get() as $photo)
                    <a href="{{ $photo->src }}" class="gallery">
                        <img src="{{ $photo->thumbsrc }}" alt="{{ $photo->caption }}">
                    </a>
                @endforeach

        </div>


    </div>

    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.4/jquery.detect_swipe.min.js"></script> <!-- enable swipe when viewing photos on touch enabled devices -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.6.3/js/jquery.justifiedGallery.min.js"></script> <!-- snazzy layout -->
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js"></script> <!-- Lightbox -->
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.gallery.min.js"></script> <!-- Extends lightbox to add the photo gallery functionality -->
    <script>
        // wait until justified Gallery has completed loading and sortting out all the images
        $("#photoGallery").justifiedGallery({}).on('jg.complete', function () {
        
            // initiate the gallery when images are clicked/tapped
            $('a.gallery').featherlightGallery({
                previousIcon: '«',
                nextIcon: '»',
                galleryFadeIn: 300,
                openSpeed: 300
            });

            // puts the alt text of the images as captions when opened
            $.featherlight.prototype.afterContent = function() {
                var caption = this.$currentTarget.find('img').attr('alt');
                this.$instance.find('.caption').remove();
                $('<div class="caption">').text(caption).appendTo(this.$instance.find('.featherlight-content'));
            };
        });
    </script>
    </body>
</html>
