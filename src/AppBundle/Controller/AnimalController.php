<?php

namespace AppBundle\Controller;

use Appbundle\Entity\Animal;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnimalController extends Controller
{

     /**
     * @Route("/", name="homePage")
     */
    public function homePageAction()
    {
        // replace this example code with whatever you need
        return $this->render('animal/homepage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/animal", name="animal")
     */
    public function animalAction()
    {
        return $this->render('animal/animalMain.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/listAnimal", name="listAnimal")
     */
    public function listAnimalAction()
    {   

        // dump($this->getUser()->getCropNumber());
        // die;
        $cropNumber = $this->getUser()->getCropNumber();
        $animals = $this->getDoctrine()->getRepository('AppBundle:Animal')->findBy(array('cropNumber' => $cropNumber));
            
        return $this->render('animal/listAnimal.html.twig', ['animals' => $animals]) ;
    }

     /**
     * @Route("/editAnimal/{id}", name="editAnimal")
     */
    public function editAnimalAction($id, Request $request)
    {
        return $this->render('animal/editAnimal.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

           /**
     * @Route("/detailsAnimal/{id }", name="detailsAnimal")
     */
    public function detailsAnimalAction($id, Request $request)
    {
        return $this->render('animal/detailsAnimal.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }



}
