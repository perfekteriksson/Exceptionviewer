Exceptionviewer
===============

View exception thrown by Laravel in your browser

Installation
===============

To install this package:

1. Add the following to the "requires"-section of your composer.json file:

	"perfekteriksson/exceptionviewer": "dev-master"

2. Run `composer update` followed by `composer install`.

3. Run migrations: `php artisan migrate --package=perfekteriksson/exceptionviewer`

4. Register the service provider in app/config/app.php: `Perfekteriksson\Exceptionviewer\ExceptionviewerServiceProvider`.

5. That's it!