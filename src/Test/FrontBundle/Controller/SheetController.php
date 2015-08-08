<?php
/**
 * Created by PhpStorm.
 * User: ALEXIS
 * Date: 26/07/2015
 * Time: 23:11
 */

namespace Test\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\FrontBundle\Entity\Sheet;

class SheetController extends Controller
{
    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();

        $repository=$em->getRepository('TestFrontBundle:Sheet');
        $sheets= $repository->getAll();

        return $this->render('TestFrontBundle:Sheet:list.html.twig',
                                array('sheet'=>$sheets)
        );
    }

    public function showAction($id)
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('TestFrontBundle:Sheet');
        $sheet= $repository->find($id);

        return $this->render('TestFrontBundle:Sheet:show.html.twig',
            array('sheeto' => $sheet)
        );
    }

    public  function createAction()
    {

        $form=$this->createFormBuilder(new Sheet())
            ->add('name')
            ->add('type')
            ->add('auteur')
            ->add('duration')
            ->add('released','date')
            ->add('Envoyer','submit')
            ->getForm();

        return $this->render('TestFrontBundle:Sheet:create.html.twig',
            array('form' => $form->createView())
        );

    }
}