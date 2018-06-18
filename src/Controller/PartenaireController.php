<?php 
namespace App\Controller;
//src/Controller/PublicContoller.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
// annotations pour les routes
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// pour la table des partenaire
use App\Entity\Partenaire;




class PartenaireController extends Controller
{

/**
* @Route("/",
* name="index")
*/
	public function index()
		{
			return $this->render('public/index.html.twig',
		                  array('title' => 'Bienvenue'));
		}

	
/**
* @Route("/Partenaire",
* name="Partenaire")
*/
    public function partenaire()
    {
    	// appele du  Partenaire
    	$partenaire = $this->getDoctrine()->getRepository(Partenaire::class);
    	// liste de toute les partenaires (SELECT * FROM partenaire)
    	$listePartenaire = $partenaire->findAll();
    return $this->render('public/partenaire.html.twig',
                   array('title' => 'Nos partenaire',
                         'partenaire' =>$listePartenaire));
    }





}
