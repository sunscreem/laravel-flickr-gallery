<?php

namespace Sunscreem\LaravelFlickrGallery\Commands;

use Flickr;
use Carbon\Carbon;
use App\FlickrPhoto;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class PullFromFlickr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flickr:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the latest flickr photos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Started fetching data from Flickr');

        $data = $this->fetchFlickrData();
    }

    private function fetchFlickrData()
    {
        $flickrRequest = Flickr::request(
            'flickr.people.getPublicPhotos',
            ['user_id' => config('site.flickrUserId')]
        );

        $photos = collect($flickrRequest->photos['photo']);

        $countOfPhotosAdded =
            $photos->reject(function ($photo) {
                return FlickrPhoto::where(['flickr_id' => $photo['id']])->count();
            })
            ->each(function ($photo) {
                $this->line('Added a new photo from Flickr');

                FlickrPhoto::create([
                    'flickr_id' => $photo['id'],
                    'caption' => $photo['title'],
                    'src' => $this->buildSRC($photo, 'b'),
                    'thumbsrc' => $this->buildSRC($photo, 'n')
                ]);
            })->count();

        $this->info('All done. ' . $countOfPhotosAdded . ' new flickr photos added.');
    }

    /** Build the image url using the weird format that flickr need.
     *  Adding a "sizeSuffix" allows us to select sizing.
     *  See https://www.flickr.com/services/api/misc.urls.html
     */
    private function buildSRC($photo, $sizeSuffix)
    {
        return 'https://farm'
            . $photo['farm']
            . '.staticflickr.com/'
            . $photo['server']
            . '/'
            . $photo['id']
            . '_'
            . $photo['secret']
            . '_'
            . $sizeSuffix
            . '.jpg';
    }
}
