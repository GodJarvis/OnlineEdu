@echo off
php artisan make:controller Admin/StreamController
php artisan make:controller Admin/LiveController
php artisan make:model Admin/Stream
php artisan make:model Admin/Live
pause:
