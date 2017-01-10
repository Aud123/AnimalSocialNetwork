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
        // dump($this->getUser());
        // dump($cropNumber);
        // die;
        $animals = $this->getDoctrine()->getRepository('AppBundle:Animal')->findBy(array('cropNumber' => $cropNumber));
            
        return $this->render('animal/listAnimal.html.twig', ['animals' => $animals]) ;
    }

    /**
     * @Route("removeAnimal/{id}", name="removeAnimal")
     */
    public function removeAnimalAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $animal = $em->getRepository('AppBundle:Animal')->find($id);
   
        $em->remove($animal);
        $em->flush();

        $this->addFlash('notice', 'animal removed');

        return $this->redirectToRoute('listAnimal');

    }

    // /**
    //  * @Route("addAnimal", name="addAnimal")
    //  */
    public function addAnimalAction($id)
    {
        $animals = $this->getDoctrine()->getRepository('AppBundle:Animal')->findAll();
        
        return $this->render('animal/addAnimal.html.twig', ['animals' => $animals]) ;

    }

}
