<?php

namespace TodoBundle\Controller;

use TodoBundle\Entity\TodoItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;
use TodoBundle\Form\Type\ItemType;

class TodoController extends Controller {

    public function newAction(Request $request) {
        $item = new TodoItem();
        $item->setCreationDate(new \DateTime('now'));

        // TODO : FormType
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();            
            $objDate = new DateTime($item->getTodoDate());
            $item->setTodoDate($objDate);
            $em->persist($item);
            $em->flush();

            $this->get('session')->getFlashBag()->set('info', $item->getTitle() . ' is added.');
            return $this->redirect($this->generateUrl('todo_new'));
        }

        return $this->render('TodoBundle:Todo:new.html.twig', array('form' => $form->createView()));
    }

    public function showListAction() {
        $repo = $this->getDoctrine()->getRepository("TodoBundle:TodoItem");
        $items = $repo->findAll();
        return $this->render('TodoBundle:Todo:show_list.html.twig', ['items' => $items]);
    }

    public function updateFinishedStateAction(Request $request) {
        $id = $request->get("id");
        $state = $request->get("state");
        $repo = $this->getDoctrine()->getRepository("TodoBundle:TodoItem");
        $item = $repo->findOneById($id);
        $item->setFinished($state == "true" ? true : false);
        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();

        return new JsonResponse(['success, item with id ' => $item->getId() . ' stored']);
    }
    
    public function updateDateAction(Request $request) {
        $id = $request->get("id");
        $date = $request->get("date");
        $repo = $this->getDoctrine()->getRepository("TodoBundle:TodoItem");
        $item = $repo->findOneById($id);
        $item->SetTodoDate( new DateTime($date) );
        $em = $this->getDoctrine()->getManager();
        $em->persist($item);
        $em->flush();
        
        return new JsonResponse(['success, date of with id ' => $item->getId() . ' changed']);
    }

}
