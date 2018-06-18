<?php
namespace App\Controller;
//src/Controller/DonController

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//sécurité
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
//pour utiliser les annotations
use Symfony\Component\Routing\Annotation\Route;
// table utilisateurs
use App\Entity\Don;
//formulaire inscription
use App\Form\FormDonType;

class DonController extends Controller
{
	/* Proposer un Don
	affiche le formulaire pour le don 
	*/
	/**
	* @Route(
	*		"/formDon",
	*	  name="formDon")
	*/
	public function formDon(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		//liaison avec la table des utilisateurs
		$don = new Don();
		//création du formulaire
		$form = $this->createForm(FormDonType::class, $don);

		//récupération des données du formulaire
		$form->handleRequest($request);
		//si soumis et validé
		if($form->isSubmitted())
		{

			//enregistrement dans la table
			$em = $this->getDoctrine()->getManager();
			$em->persist($don);
			$em->flush();

			//retour à l'accueil
			return $this->redirectToRoute('index');
		}
		//affichage du formulaire
		return $this->render('templates/professionnel.html.twig',
									array('form' => $form->createView(),
												'title' => 'formDon'));
	}


}