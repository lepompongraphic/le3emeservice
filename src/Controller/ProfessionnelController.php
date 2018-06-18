<?php
namespace App\Controller;
//src/Controller/SecurityController

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
// table professionnel
use App\Entity\Professionnel;
//formulaire inscription
use App\Form\ProfessionnelType;

class ProfessionnelController extends Controller
{
	/* Inscription d'un utilisateur
	affiche le formulaire et ajoute l'utilisateur dans la table professionnel 
	*/
	/**
	* @Route(
	*		"/inscription",
	*	  name="inscription")
	*/
	public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		//liaison avec la table des professionnel
		$professionnel = new Professionnel();
		//création du formulaire
		$form = $this->createForm(ProfessionnelType::class, $professionnel);

		//récupération des données du formulaire
		$form->handleRequest($request);
		//si soumis et validé
		if($form->isSubmitted() && $form->isValid())
		{
			//encodage du mot de passe
			$hash = $passwordEncoder->encodePassword($professionnel, $professionnel->getPasswordProfessionnel());
			$professionnel->setPasswordProfessionnel($hash);
			//enregistrement dans la table
			$em = $this->getDoctrine()->getManager();
			$em->persist($professionnel);
			$em->flush();

			//retour à l'accueil
			return $this->redirectToRoute('index');
		}
		//affichage du formulaire
		return $this->render('security/inscription.html.twig',
									array('form' => $form->createView(),
												'title' => 'Inscription'));
	}

	/**
	* @Route(
	*		"/login",
	*	  name="login")
	*/
	public function login(Request $request, AuthenticationUtils $authUtils)
	{
		//récupération de l'erreur si besoin
		$error = $authUtils->getLastAuthenticationError();
		//dernier username saisi
		$lastUsername = $authUtils->getLastUsername();

		//affichage du formulaire
		return $this->render('security/login.html.twig',
							array('last_username' => $lastUsername,
										'error' => $error,
										'title' => 'login'));
	}	
	/**
	* @Route(
	*		"/logout",
	*	  name="logout")
	*/
}