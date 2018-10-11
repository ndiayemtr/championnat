<?php

namespace Championnat\sunuChampionnatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Championnat\sunuChampionnatBundle\Form\EquipeType;
use Championnat\sunuChampionnatBundle\Form\RencontreType;
use Championnat\sunuChampionnatBundle\Entity\Equipe;
use Championnat\sunuChampionnatBundle\Entity\Rencontre;

class ChampionnatController extends Controller {

    // Permet de voir les rencontres programmées
    public function indexAction() {
        
        //Permet de recupere l'entity doctrine
        $em = $this->getDoctrine()->getManager();
        
        //On recupere touts les matchs programmés
        $rencsontre = $em->getRepository('sunuChampionnatBundle:Rencontre')->tousLesRencontres();
        
        //On retourne le resultats dans la vue index.html.twig
        return $this->render('sunuChampionnatBundle:Championnat:index.html.twig', array(
                    'rencontres' => $rencsontre
        ));
    }

    //Permet d'efficher le liste des équipes
    public function listeDesEquipesAction() {

        $em = $this->getDoctrine()->getManager();
        
        $equipes = $em->getRepository('sunuChampionnatBundle:Equipe')->findAll();
        
        return $this->render('sunuChampionnatBundle:Championnat:liste_des_equipes.html.twig', array(
                    'equipes' => $equipes
        ));
    }

    //Voir une rencontre
    public function uneRencontreAction($id) {

        $em = $this->getDoctrine()->getManager();
        
        //Permet de recupérer une rencontre
        $rencontre = $em->getRepository('sunuChampionnatBundle:Rencontre')->uneRencontre($id);
        
        return $this->render('sunuChampionnatBundle:Championnat:rencontre.html.twig', array(
                    'rencontre' => $rencontre
        ));
    }
    
     //Voir classement general
    public function classementAction() {

        $em = $this->getDoctrine()->getManager();
        
         $classements = $em->getRepository('sunuChampionnatBundle:Equipe')->findBy([], ['points' => 'desc']);

        return $this->render('sunuChampionnatBundle:Championnat:classement.html.twig', array(
                    'classements' => $classements
        ));
        
        
    }

    //Permet d'ajouter des points aux equipes
    public function addPointsAction($id) {
        
        $em = $this->getDoctrine()->getManager();
        
        $rencontre = $em->getRepository('sunuChampionnatBundle:Rencontre')->uneRencontre($id);
        
        //On verifie le resultat du match 
        if ($rencontre[0]->getButDomicile() > $rencontre[0]->getButExterieur()) {
           
            $pts = $rencontre[0]->getEquipes()[0]->getpoints();
            $rencontre[0]->getEquipes()[0]->setPoints($pts+3);
            
        } elseif ($rencontre[0]->getButDomicile()  <  $rencontre[0]->getButExterieur()) {
            
           $pts = $rencontre[0]->getEquipes()[1]->getpoints();
            $rencontre[0]->getEquipes()[1]->setPoints($pts+3);
       
    } elseif($rencontre[0]->getButDomicile() == $rencontre[0]->getButExterieur()) {
               
      $pts = $rencontre[0]->getEquipes()[1]->getpoints();
      $rencontre[0]->getEquipes()[1]->setPoints($pts+1);
      
      
      $pts2 = $rencontre[0]->getEquipes()[0]->getpoints();
       $rencontre[0]->getEquipes()[0]->setPoints($pts+1);
      // var_dump($rencontre[0]->getEquipes()[1]->setPoints($pts2+1));
            
    }
    
    $em->flush();
    return $this->redirectToRoute('sunu_championnat_classement');
      
    }

    //Permet d'ajouter un but
    public function addButAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $rencontre = $em->getRepository('sunuChampionnatBundle:Rencontre')->uneRencontre($id);
        
        //On verifie quelle équipe a marqué un but
        if ($rencontre[0]->getEquipes()[0]->getNomEquipe() == $request->request->get('but')) {
            $but = $rencontre[0]->getButDomicile();
            $but = $but + 1;
            $rencontre[0]->setButDomicile($but);
            $rencontre[0]->setButDomicile($but);
        } else {
            $but = $rencontre[0]->getButExterieur();
            $but = $but + 1;
            $rencontre[0]->setButExterieur($but);
        }

        $em->flush();


        return $this->redirectToRoute('sunu_championnat_une_rencontre', array(
                    'id' => $id
        ));
    }

    // Prgrammer un match dans les systéme
    public function programmerMatchAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $rencontre = new Rencontre();
        
        //On les initialise à 0 au depart
        $rencontre->setButDomicile(0);
        $rencontre->setButExterieur(0);
        $rencontre->setJournee(0);

        $form = $this->createForm(RencontreType::class, $rencontre);

        // Si les données sont valides sont l'enregistre le match programmé
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em->persist($rencontre);
            $em->flush();
            return $this->redirectToRoute('sunu_championnat_index');
        }

        //Retournée le formulaire dans le view prgrammer_match.html.twig
        return $this->render('sunuChampionnatBundle:Championnat:prgrammer_match.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    // Permet d'ajouter une equipe dans les systéme
    public function addEquipeAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $equipe = new Equipe();
        $equipe->setPoints(0);
        $equipe->setNbJourneesJouee(0);

        $form = $this->createForm(EquipeType::class, $equipe);

        //Verifie si les données saisies sont valides
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em->persist($equipe);
            $em->flush();
            return $this->redirectToRoute('sunu_championnat_liste_des_equipes');
        }

        //Retournée le formulaire dans le view add_equipe.html.twig
        return $this->render('sunuChampionnatBundle:Championnat:add_equipe.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
