<?php
namespace App\Controller;
//src/Controller/MembreController

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
// table membre
use App\Entity\Membre;
//formulaire inscription
use App\Form\FormType;

class MembreController extends Controller

{
	/* Inscription d'un utilisateur
	affiche le formulaire et ajoute l'utilisateur dans la table membre 
	*/
	/**
	* @Route(
	*		"/inscription",
	*	  name="inscription")
	*/
	public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		//liaison avec la table des membre
		$membre = new Membre();
		//création du formulaire
		$form = $this->createForm(FormType::class, $membre);

		//récupération des données du formulaire
		$form->handleRequest($request);
		//si soumis et validé
		if($form->isSubmitted() && $form->isValid())
		{
			//encodage du mot de passe
			$hash = $passwordEncoder->encodePassword($membre, $membre->getPassword());
			$membre->setPassword($hash);
			//enregistrement dans la table
			$em = $this->getDoctrine()->getManager();
			$em->persist($membre);
			$em->flush();

			//retour à l'accueil
			return $this->redirectToRoute('index');
		}
		//affichage du formulaire
		return $this->render('inscription.html.twig',
									array('form' => $form->createView(),
												'title' => 'Inscription'));
	}

	/**
	* @Route(
	*		"/login",
	*	  name="login")
	*/
	public function connexion(Request $request, AuthenticationUtils $authUtils)
	{
		//récupération de l'erreur si besoin
		$error = $authUtils->getLastAuthenticationError();
		//dernier username saisi
		$lastUsername = $authUtils->getLastUsername();

		//affichage du formulaire
		return $this->render('login.html.twig',
							array('last_username' => $lastUsername,
										'error' => $error,
										'title' => 'connexion'));
	}	
	/**
	* @Route(
	*		"/logout",
	*	  name="logout")
	*/
}