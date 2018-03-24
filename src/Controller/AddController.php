<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AddController extends Controller
{
    /**
     * @Route("/add", name="add")
     */
    public function index(Request $request)
    {
        $data=[];
        $form=$this->createFormBuilder()
            ->add('nume1', TextType::class, array('attr'=>array('size'=>'30','placeholder'=>'0'),'label'=>false))
            ->add('nume2', TextType::class, array('attr'=>array('size'=>'1','value'=>'+'),'label'=>false))
            ->add('nume3', TextType::class, array('attr'=>array('size'=>'30','placeholder'=>'0'),'label'=>false))
            ->add('submit', SubmitType::class, array('label'=>'='))
            ->add('nume4', TextType::class, array('attr'=>array('size'=>'30','placeholder'=>'0'),'label'=>false,'required' => false))
            ->getForm();
        $form->handleRequest($request);
        $data['head']="<h1>Input your data</h1>";
        $data['form']=$form->createView();

        if($form->isSubmitted()){

            $data['value1'] = $form->get('nume1')->getData();
            $data['value2']='+';
            $data['value3'] = $form->get('nume3')->getData();
            $data['value4']=$data['value1']+$data['value3'];
        }else {
            $data['value1']=0;
            $data['value2']=0;
            $data['value3']=0;
            $data['value4']=0;
        }
        return $this->render('add/index.html.twig', $data);
    }


}
