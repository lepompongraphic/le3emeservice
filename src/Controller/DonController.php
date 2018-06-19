<?php
namespace App\Controller;

/* src/Controller/DonController */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Sécurité :
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

// Pour utiliser les annotations :
use Symfony\Component\Routing\Annotation\Route;

// Table don :
use App\Entity\Don;

// Formulaire don :
use App\Form\FormDonType;

class DonController extends Controller
{
	/**
	* @Route(
	* "/formDon",
	* name="formDon")
	*/
	public function formDon(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		// Liaison avec la table :
		$don = new Don();

		// Création du formulaire :
		$form = $this->createForm(FormDonType::class, $don);

		// Récupération des données du formulaire :
		$form->handleRequest($request);

		// Si soumis et validé :
		if($form->isSubmitted())
		{

			// Enregistrement dans la table :
			$em = $this->getDoctrine()->getManager();
			$em->persist($don);
			$em->flush();

			// Retour à l'accueil :
			return $this->redirectToRoute('index');
		}
		// Affichage du formulaire :
		return $this->render('templates/professionnel.html.twig',
									array('form' => $form->createView()));
	}


}