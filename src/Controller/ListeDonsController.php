<?php
namespace App\Controller;

//src/Controller/ListeDonsController

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Pour utiliser les annotations :
use Symfony\Component\Routing\Annotation\Route;

// Table don :
use App\Entity\Don;

class ListeDonsController extends Controller
{
	
	public function listeDons()
	{
		$liste = $this->getDoctrine()->getRepository(Don::class)->findDons($data->getVille());
			// return new Response('<pre>'.print_r($liste, true));
			return $this->render('listeDons.html.twig', array('liste' => $liste));
	}
}