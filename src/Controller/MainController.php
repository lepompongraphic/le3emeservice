<?php
namespace App\Controller;

/* src/Controler/MainControler.php */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
	/**
	* @Route("/index", name="index")
	*/
	public function index()
	{
		return $this->render('index.html.twig');
	}

	/**
	* @Route("/mentions", name="mentions")
	*/
	public function mentions()
	{
		return $this->render('mentions.html.twig');
	}

}