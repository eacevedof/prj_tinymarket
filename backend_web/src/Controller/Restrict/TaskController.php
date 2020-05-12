<?php

namespace App\Controller\Restrict;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

use App\Entity\App\Task;
use App\Form\TaskType;

class TaskController extends BaseController
{
    public function index()
    {
        //$em = $this->getDoctrine()->getManager();
        $repotask = $this->getDoctrine()->getRepository(Task::class);
        //$tasks = $repotask->findAll();
        $tasks = $repotask->findBy([],["id"=>"DESC"]);

        return $this->render('restrict/system/task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    public function detail(Task $task){
        if(!$task){
            return $this->redirectToRoute("tasks");
        }

        return $this->render("restrict/system/task/detail.html.twig",["task"=>$task]);
    }

    public function creation(Request $request, UserInterface $user)
    {
        if(!$user) {
            dump($user);
            die;
        }
        $task = new Task();
        $form = $this->createForm(TaskType::class,$task);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            $task->setCreatedAt(new \Datetime("now"));
            $task->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            
            return $this->redirect($this->generateUrl("task_detail",["id"=>$task->getId()]));

        }
        return $this->render("restrict/system/task/creation.html.twig",[
            "form"=>$form->createView()
        ]);
    }

    //mis-tareas
    public function myTasks(UserInterface $user){
        $tasks = $user->getTasks();
        return $this->render("restrict/system/task/my-tasks.html.twig",["tasks"=>$tasks]);
    }
    
    //editar-tarea/{id}
    public function edit(Request $request,UserInterface $user, Task $task){
        if(!$user || $user->getId() != $task->getUser()->getId())
            return $this->redirectToRoute("tasks");
        
        $form = $this->createForm(TaskType::class,$task);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            
            $task->setCreatedAt(new \Datetime("now"));
            $task->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            
            return $this->redirect($this->generateUrl("task_detail",["id"=>$task->getId()]));

        }
        return $this->render("restrict/system/task/creation.html.twig",["edit"=>true,
            "form"=>$form->createView()
        ]);
    }

    //tarea/delete/{id}
    public function delete(UserInterface $user, Task $task)
    {
        if(!$task)
            return $this->redirectToRoute("tasks");        
        
        if(!$user || $user->getId() != $task->getUser()->getId())
            return $this->redirectToRoute("tasks");
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();
        return $this->redirectToRoute("tasks");
    }

}//TaskController
