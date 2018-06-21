<?php
namespace App\Controller;
//src/Controller/ProfilController

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//sécurité
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
//pour utiliser les annotations
use Symfony\Component\Routing\Annotation\Route;
// table membre
use App\Entity\Membre;
// table dons
use App\Entity\Don;
//formulaire inscription
use App\Form\FormDonType;

class ProfilController extends Controller

{
	/* Profile d'un utilisateur
	affiche le formulaire et ajoute l'utilisateur dans la table membre 
	*/
	/**
	* @Route(
	*		"/profil",
	*	  name="profil")
	*/
	
	public function profil(AuthorizationCheckerInterface $authChecker, Request $request)
	{

		if($authChecker->isGranted('ROLE_ADMIN'))
		{
			$profil = 'admin';
		}
		else
		{
			$profil = 'user';
		}


		//liaison avec la table des utilisateurs
		$don = new Don();
		//création du formulaire
		$form = $this->createForm(FormDonType::class, $don);

		//récupération des données du formulaire
		$form->handleRequest($request);
		//si soumis et validé
		if($form->isSubmitted())
		{

			$user = $this->getUser()->getIdMembre();
			$don->setIdMembre($user);
			//enregistrement dans la table
			$em = $this->getDoctrine()->getManager();
			$em->persist($don);
			$em->flush();

			//retour à l'accueil
			//return $this->redirectToRoute('index');
		}
		//affichage du formulaire
		return $this->render('profil.html.twig',
									array('profil' => $profil,
											'formDon' => $form->createView(),
											'title' => 'profil'));
	}
	
}