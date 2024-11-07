<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\HorizonServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    Yajra\DataTables\DataTablesServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    \SocialiteProviders\Manager\ServiceProvider::class, // add
];
