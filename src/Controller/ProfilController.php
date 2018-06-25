<?php
namespace App\Controller;

//src/Controller/ProfilController

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Sécurité :
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

// Pour utiliser les annotations :
use Symfony\Component\Routing\Annotation\Route;

// Table membre :
use App\Entity\Membre;

// Table don :
use App\Entity\Don;

// Formulaire Don :
use App\Form\FormDonType;

// Formulaire Recherche :
use App\Form\FormRechercheType;

class ProfilController extends Controller
{
	/**
	* @Route(
	* "/profil",
	* name="profil")
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


		// Enregistrement Don :
		// Récupération id et ville membre :
		$don = $this->getUser();
		$idMembre = $don->GetIdMembre();
		$villeMembre = $don->GetVille();
		// Liaison avec la table Don :
		$don = new Don();
		$don->setIdMembre($idMembre);
		$don->setVille($villeMembre);
		$don->setReservation('non');
		// Création du formulaire :
		$form = $this->createForm(FormDonType::class, $don);
		// Récupération des données du formulaire :
		$form->handleRequest($request);
		// Si soumis et validé :
		if($form->isSubmitted() && $form->isValid())
		{
			// Enregistrement dans la table :
			$em = $this->getDoctrine()->getManager();
			$em->persist($don);
			$em->flush();

			// Retour au profil :
			return $this->redirectToRoute('profil');
		}


		// Recherche Don :
		// Requête affichage villes :
		$listeVille = $this->getDoctrine()->getRepository(Don::class)->findByVilles();

		$donsRecherche = new Don();
		// Formulaire de recherche par ville :
		$formRecherche = $this->createForm(FormRechercheType::class, $donsRecherche);
		// Récupération des données du formulaire :
		$formRecherche->handleRequest($request);
		// Si soumis et validé :
		if($formRecherche->isSubmitted() && $formRecherche->isValid())
		{
			$data = $formRecherche->getData();
			$liste = $this->getDoctrine()->getRepository(Don::class)->findDons($data->getVille());
			// return new Response('<pre>'.print_r($liste, true));
			return $this->render('listeDons.html.twig', array('liste' => $liste));
		}
		

		// Affichage :
		return $this->render('profil.html.twig', array('profil' => $profil, 'formDon' => $form->createView(), 'listeVille' => print_r($listeVille), 'formRecherche' => $formRecherche->createView()));
	}
}