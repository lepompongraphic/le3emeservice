<?php 
namespace App\Controller;
//src/Controller/PartenaireContoller.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
// annotations pour les routes

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// pour la table des partenaire
use App\Entity\Membre;




class PartenaireController extends Controller
{

/**
* @Route("/Partenaire",
* name="Partenaire")
*/
    public function partenaire()
    {
    	// appele du  Partenaire
    	$partenaire = $this->getDoctrine()->getRepository(Membre::class);
    	// liste de toute les partenaires (SELECT * FROM membre)
    	$listePartenaire = $partenaire->findAll();
    return $this->render('partenaire.html.twig',
                   array('title' => 'Nos partenaires',
                         "partenaire" => $listePartenaire));
    }

 


}
