php artisan make:controller VehicleController --resource
php artisan make:controller BrandController --resource
php artisan make:controller ModelController --resource
php artisan make:model Vehicle --migration
php artisan make:model Models --migration
php artisan migrate:refresh
