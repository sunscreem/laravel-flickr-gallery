# Add a Flickr album to your website

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sunscreem/laravel-flickr-gallery.svg?style=flat-square)](https://packagist.org/packages/sunscreem/laravel-flickr-gallery)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/sunscreem/laravel-flickr-gallery.svg?style=flat-square)](https://packagist.org/packages/sunscreem/laravel-flickr-gallery)

Flickr has some great tools for uploading, storing and editing your photos. This package uses the flickr API to bring those photo to your own website.

It includes an optional lightbox/swipeable photo gallery.

This package has only been tested on Laravel >= 5.5

## Installation

First, install the package via composer:

```bash
composer require sunscreem/laravel-flickr-gallery
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

Here's a guide on [finding your Flickr ID](https://www.pixsy.com/academy/flickr-id/).

And here's how to generate your [API key and secret](https://www.flickr.com/services/api/misc.api_keys.html).

```php 
FLICKR_USER_ID_TO_FETCH=1234567890@N00
FLICKR_KEY=[your-flickr-key]
FLICKR_SECRET=[your-flickr-secret]
```

## Usage

Using `php artisan` you can pull in the latest photos from Flickr. You can, of course, [schedule this](https://laravel.com/docs/5.6/scheduling) to run in the background:

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






