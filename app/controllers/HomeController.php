<?php

	namespace App\Controller;

	use Helpers\Render;

	class HomeController
	{
		public function index()
		{
			return Render::renderTemplate('home', array());
		}

	}