<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Venda;
use AppBundle\Form\VendaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VendaController extends Controller
{
    /**
     * @Route("/venda", name="venda_list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $vendas = $em->getRepository(Venda::class)->findAll();

        return $this->render('venda/index.html.twig', [
            'vendas' => $vendas
        ]);
    
    }

    /**
     * @Route("/venda/create", name="venda_create")
     */
    public function createAction(Request $request)
    {
        $venda = new Venda();

        $form = $this->createForm(VendaType::class, $venda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($venda);
            $em->flush();

            $this->addFlash(
                'notice',
                'Venda adicionado com sucesso!'
            );

            return $this->redirectToRoute('venda_list');
        }

        return $this->render('venda/form.html.twig', [
            'acao' => 'Novo',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/venda/edit/{id}", name="venda_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $venda = $em->getRepository(Venda::class)->find($id);

        $form = $this->createForm(VendaType::class, $venda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash(
                'notice',
                'venda alterado com sucesso!'
            );

            return $this->redirectToRoute('venda_list');
        }

        return $this->render('venda/form.html.twig', [
            'acao' => 'Atualizar',
            'form' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/venda/details/{id}", name="venda_details")
     */
    public function detailsAction($id)
    {
        return $this->render('venda/details.html.twig');
    }
}
