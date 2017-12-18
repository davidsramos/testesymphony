<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pessoa;
use AppBundle\Form\PessoaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ClienteController extends Controller
{
    /**
     * @Route("/cliente", name="cliente_list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository(Pessoa::class)->findAll();

        return $this->render('cliente/index.html.twig', [
            'clientes' => $clientes
        ]);
    }

    /**
     * @Route("/cliente/create", name="cliente_create")
     */
    public function createAction(Request $request)
    {
        $cliente = new Pessoa();

        $form = $this->createForm(PessoaType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

            $this->addFlash(
                'notice',
                'Cliente adicionado com sucesso!'
            );

            return $this->redirectToRoute('cliente_list');
        }

        return $this->render('cliente/form.html.twig', [
            'acao' => 'Novo',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cliente/edit/{id}", name="cliente_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository(Pessoa::class)->find($id);

        $form = $this->createForm(PessoaType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($cliente);
            $em->flush();

            $this->addFlash(
                'notice',
                'Cliente alterado com sucesso!'
            );

            return $this->redirectToRoute('cliente_list');
        }

        return $this->render('cliente/form.html.twig', [
            'acao' => 'Atualizar',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cliente/delete/{id}", name="cliente_delete")
     */
    public function deletesAction($id)
    {
       $em = $this->getDoctrine()->getManager();
       $cliente = $em->getRepository(Pessoa::class)
                    ->find($id);

        $em->remove($cliente);
        $em->flush();

        $this->addFlash(
                'notice',
                'Cliente removido com sucesso!'
            );

        return $this->redirectToRoute('cliente_list');
    }
}
