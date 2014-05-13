<?php namespace Perfekteriksson\Exceptionviewer;

use Illuminate\Support\ServiceProvider;

class ExceptionviewerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('perfekteriksson/Exceptionviewer');

		include __DIR__.'/../../routes.php';
		include __DIR__.'/../../controllers/ExceptionViewerController.php';

		$view = $this->app->make("View")->getFacadeRoot();
		$view->addNamespace('Perfekteriksson/Exceptionviewer', __DIR__.'/../../views');

		$log = $this->app->make("Log")->getFacadeRoot();
		$auth = $this->app->make("Auth")->getFacadeRoot();
		$db = $this->app->make("DB")->getFacadeRoot();
		$request = $this->app->make("Request")->getFacadeRoot();

		$log->listen(function($level, $exception, $context) use($auth, $db, $request) {
		    $user = $auth->getUser();
		    if($user !== null) {
		        $user = $user->email;
		    } else {
		        $user = 'Guest';
		    }

		    $context = $_SERVER;
		    if($context['REQUEST_METHOD'] === 'POST') {
		        $context['FORM'] = $_POST;
		    } else {
		        $context['FORM'] = array();
		    }

		    $db->table("log")->insert(
		        array(
		            'url' => $request->url(),
		            'file' => $exception->getFile(),
		            'line' => $exception->getLine(),
		            'message' => $exception->getMessage(),
		            'level' => $level,
		            'stacktrace' => $exception->getTraceAsString(),
		            'user' => $user,
		            'type' => get_class($exception),
		            'context' => json_encode($context),
		            'datetime' => date('Y-m-d H:i:s')
		        )
		    );
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
