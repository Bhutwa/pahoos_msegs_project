# pahoos_msegs_project

Pakages used 
1. Farhanwazir/googlemaps
2. laravel/ui
    
    -------Add googlemap pakage
    #composer require farhanwazir/laravelgooglemaps:dev-master

    Let’s Add service provider in config/app.php
    FarhanWazir\GoogleMaps\GMapsServiceProvider::class,
    
    add in the alias section config/app.php
    'GMaps' => FarhanWazir\GoogleMaps\Facades\GMapsFacade::class,
    
    -------Add Laravel/ui    
    #composer require laravel/ui:^2.4
    #php artisan ui vue --auth
    
    // Get GoogleMaps Api from cloud google and add a new line in .env file 
    GOOGLE_MAPS_API= YOUR_API_KEY
    
    Reference used for Google Map Functionality
    https://investmentnovel.com/laravel-google-maps-example/
