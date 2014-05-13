Exceptionviewer
===============

View exception thrown by Laravel in your browser. Example: 


![Overview](http://i.imgur.com/9Ty2LBv.png "Overview")
![Details](http://i.imgur.com/dIR22Rb.png "Details")


Installation
===============

To install this package:

1. Add the following to the "requires"-section of your composer.json file:

    "perfekteriksson/exceptionviewer": "dev-master"
	
2. Run `composer update` followed by `composer install`.

3. Run migrations: `php artisan migrate --package=perfekteriksson/exceptionviewer`

4. Register the service provider in app/config/app.php: `Perfekteriksson\Exceptionviewer\ExceptionviewerServiceProvider`.

5. That's it! Visit /exceptions to view all errors.

TODO
===============
* Add support for authentication