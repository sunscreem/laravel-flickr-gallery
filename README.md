# Add a Flickr collection to your website

Flickr has some great tools for uploading, storing and editing your photos. This package uses the flickr API to bring those photo to your own website.

It includes an optional lightbox/swipeable photo gallery.

## Installation

First, install the package via composer:

```bash
composer require sunscreem/laravel-flickr-galler
```

The package will automatically register itself.

Now publish the configuration file and example view:

```bash
php artisan vendor:publish --provider="Sunscreem\LaravelFlickrGallery\LaravelFlickrGalleryServiceProvider"
```

Now add the following route to your `routes\web.php` file:

```php
Route::get('/gallery', function () {
     return view('vendor.laravel-flickr-gallery.simple-photo-gallery');
 });
```

Finally perform the migration:

```bash
php artisan migrate
```

## Configuration

Set your flickr user id, key and secret in your .env file.

Instructions on how to find these are here. [TBC]

```php 
FLICKR_USER_ID_TO_FETCH=1234567890@N00
FLICKR_KEY=[your-flickr-key]
FLICKR_SECRET=[your-flickr-secret]
```

## Usage

Using `php artisan` you can pull in the latest photos from Flickr:

```bash
php artisan flickr:pull
```

Finally, view the gallery on your website by visiting `your-site.com/gallery`.

## Credits

- [Robert Cooper](https://robertcooper.xyz)
- [All Contributors](../../contributors)

## Support 

If you have found this package helpful please consider [buying Rob a beer](https://buyrobabeer.com)!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.






