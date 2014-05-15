<?php
class ExceptionviewerController extends BaseController {

	public function delete($id)
	{
		DB::delete('DELETE FROM log WHERE id = ?', array($id));
		return Redirect::to('exceptions');
	}

	public function show($id)
	{
		$errors = DB::select('select * from log where id = ?', array($id));
		$error = $errors[0];
		
		return View::make('Perfekteriksson/Exceptionviewer::show', array('error' => $error, 'context' => json_decode($error->context)));
	}

	public function listall()
	{
		$errors = DB::select('select * from log order by `datetime` desc');
		return View::make('Perfekteriksson/Exceptionviewer::listall', array('errors' => $errors));
	}

	public function flush() {
		DB::delete('delete from log');
		return Redirect::to('exceptions');
	}
}