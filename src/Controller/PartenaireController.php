<?php 
namespace App\Controller;

//* src/Controller/PartenaireContoller.php */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

// Annotations pour les routes :
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Table des partenaires :
use App\Entity\Partenaire;




class PartenaireController extends Controller
{
/**
* @Route("/Partenaire",
* name="Partenaire")
*/
    public function partenaire()
    {
    	// Appel de la table :
    	$partenaire = $this->getDoctrine()->getRepository(Partenaire::class);
    	// Liste de toute les partenaires (SELECT * FROM partenaire) :
    	$listePartenaire = $partenaire->findAll();
    return $this->render('public/partenaire.html.twig',
                   array('partenaire' =>$listePartenaire));
    }
}
