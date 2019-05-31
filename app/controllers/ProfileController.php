<?php

use Phalcon\Mvc\Controller;

class ProfileController extends Controller
{
	public function indexAction()
	{
		$error = $this->request->get('error');

		$this->view->error = $error;
	}

	public function submitAction()
	{
		$name = $this->request->get('name');
		$mob = $this->request->get('mob');
		$dob = $this->request->get('dob');
		$yob = $this->request->get('yob');
		$bio = $this->request->get('bio');

		if(empty($name) || empty($mob) || empty($dob) || empty($yob) || empty($bio)){
			$this->response->redirect('profile?error=One of the fields is invalid. Please try again');
		}

		$this->view->age = date("Y") - $yob;
		$this->view->name = $name;
		$this->view->mob = $mob;
		$this->view->dob = $dob;
		$this->view->yob = $yob;
		$this->view->bio = $bio;
	}
}