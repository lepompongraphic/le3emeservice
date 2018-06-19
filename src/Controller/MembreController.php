<?php
namespace App\Controller;

/*src/Controller/MembreController*/

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

// Table membre :
use App\Entity\Membre;

// Formulaire inscription :
use App\Form\FormType;

class MembreController extends Controller
{
	/**
	* @Route(
	* "/inscription",
	* name="inscription")
	*/
	public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
	{
		// Liaison avec la table des membres :
		$membre = new Membre();
		// Création du formulaire :
		$form = $this->createForm(FormType::class, $membre);

		// Récupération des données du formulaire :
		$form->handleRequest($request);
		// Si soumis et validé :
		if($form->isSubmitted() && $form->isValid())
		{
			// Encodage du mot de passe :
			$hash = $passwordEncoder->encodePassword($membre, $membre->getPassword());
			$membre->setPassword($hash);
			// Enregistrement dans la table :
			$em = $this->getDoctrine()->getManager();
			$em->persist($membre);
			$em->flush();

			// Retour à l'accueil
			return $this->redirectToRoute('index');
		}

		// Affichage du formulaire
		return $this->render('inscription.html.twig',
									array('form' => $form->createView()));
	}

	/**
	* @Route(
	* "/login",
	* name="login")
	*/
	public function connexion(Request $request, AuthenticationUtils $authUtils)
	{
		// Récupération de l'erreur si besoin :
		$error = $authUtils->getLastAuthenticationError();
		// Dernier username saisi :
		$lastUsername = $authUtils->getLastUsername();

		// Affichage du formulaire :
		return $this->render('login.html.twig',
							array('last_username' => $lastUsername,
										'error' => $error));
	}	
	
}