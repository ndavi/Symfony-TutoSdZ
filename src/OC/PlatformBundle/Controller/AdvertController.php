<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Image;
use OC\PlatformBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use OC\PlatformBundle\Entity\AdvertSkill;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {

    public function indexAction($page) {

        $em = $this->getDoctrine()->getManager();

        $listAdverts = $em->getRepository('OCPlatformBundle:Advert')
                ->findAll();

        if ($page < 1) {
// On déclenche une exception NotFoundHttpException, cela va afficher
// une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

// Ici, on récupérera la liste des annonces, puis on la passera au template
// Mais pour l'instant, on ne fait qu'appeler le template
        return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
                    'listAdverts' => $listAdverts
        ));
        ;
    }

    public function viewAction($id) {
        $em = $this->getDoctrine()->getManager();

        // On r�cup�re l'annonce $id
        $advert = $em
                ->getRepository('OCPlatformBundle:Advert')
                ->find($id)
        ;

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }

        // On avait d�j� r�cup�r� la liste des candidatures
        $listApplications = $em
                ->getRepository('OCPlatformBundle:Application')
                ->findBy(array('advert' => $advert))
        ;

        // On r�cup�re maintenant la liste des AdvertSkill
        $listAdvertSkills = $em
                ->getRepository('OCPlatformBundle:AdvertSkill')
                ->findBy(array('advert' => $advert))
        ;

        //$advert->setTitle("Changement de Titre");
        //$em->flush();

        return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
                    'advert' => $advert,
                    'listApplications' => $listApplications,
                    'listAdvertSkills' => $listAdvertSkills
        ));
    }

    public function addAction(Request $request) {
// Création de l'entité Advert
        // On r�cup�re l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Cr�ation de l'entit� Advert
        $advert = new Advert();
        $advert->setTitle('Recherche d�veloppeur Symfony2.');
        $advert->setAuthor('Alexandre');
        $advert->setContent("Nous recherchons un d�veloppeur Symfony2 d�butant sur Lyon. Blabla�");

        // On r�cup�re toutes les comp�tences possibles
        $listSkills = $em->getRepository('OCPlatformBundle:Skill')->findAll();

        // Pour chaque comp�tence
        foreach ($listSkills as $skill) {
            // On cr�e une nouvelle � relation entre 1 annonce et 1 comp�tence �
            $advertSkill = new AdvertSkill();

            // On la lie � l'annonce, qui est ici toujours la m�me
            $advertSkill->setAdvert($advert);
            // On la lie � la comp�tence, qui change ici dans la boucle foreach
            $advertSkill->setSkill($skill);

            // Arbitrairement, on dit que chaque comp�tence est requise au niveau 'Expert'
            $advertSkill->setLevel('Expert');

            // Et bien s�r, on persiste cette entit� de relation, propri�taire des deux autres relations
            $em->persist($advertSkill);
        }

        // Doctrine ne connait pas encore l'entit� $advert. Si vous n'avez pas d�finit la relation AdvertSkill
        // avec un cascade persist (ce qui est le cas si vous avez utilis� mon code), alors on doit persister $advert
        $em->persist($advert);

        // On d�clenche l'enregistrement
        $em->flush();

        // … reste de la méthode
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
        }
    }

    public function editAction($id, Request $request) {
// ...

        $advert = array(
            'title' => 'Recherche développpeur Symfony2',
            'id' => $id,
            'author' => 'Alexandre',
            'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
            'date' => new \Datetime()
        );

        return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
                    'advert' => $advert
        ));
    }

    public function deleteAction($id) {
// Ici, on récupérera l'annonce correspondant à $id
// Ici, on gérera la suppression de l'annonce en question

        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
    }

    public function menuAction() {
// On fixe en dur une liste ici, bien entendu par la suite
// on la récupérera depuis la BDD !
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );

        return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
// Tout l'intérêt est ici : le contrôleur passe
// les variables nécessaires au template !
                    'listAdverts' => $listAdverts
        ));
    }

    public function testAction() {
        $advert = new Advert();
        $advert->setTitle("Recherche développeur !");
        $advert->setAuthor("Nicolas");
        $advert->setContent("LocalHost/TutoSdz");
        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->flush(); // C'est à ce moment qu'est généré le slug

        return new Response('Slug généré : ' . $advert->getSlug());
        // Affiche « Slug généré : recherche-developpeur »
    }

}
