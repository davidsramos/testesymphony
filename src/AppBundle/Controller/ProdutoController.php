<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produto;
use AppBundle\Form\ProdutoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProdutoController extends Controller
{
    /**
     * @Route("/produto", name="produto_list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produtos = $em->getRepository(Produto::class)->findAll();

        return $this->render('produto/index.html.twig', [
            'produtos' => $produtos
        ]);
    
    }

    /**
     * @Route("/produto/create", name="produto_create")
     */
    public function createAction(Request $request)
    {
        $produto = new Produto();

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            $this->addFlash(
                'notice',
                'Produto adicionado com sucesso!'
            );

            return $this->redirectToRoute('produto_list');
        }

        return $this->render('produto/form.html.twig', [
            'acao' => 'Novo',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/produto/edit/{id}", name="produto_edit")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $produto = $em->getRepository(Produto::class)->find($id);

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            $this->addFlash(
                'notice',
                'produto alterado com sucesso!'
            );

            return $this->redirectToRoute('produto_list');
        }

        return $this->render('produto/form.html.twig', [
            'acao' => 'Atualizar',
            'form' => $form->createView()
        ]);
    }
    

    /**
     * @Route("/produto/details/{id}", name="produto_details")
     */
    public function detailsAction($id)
    {
        return $this->render('produto/details.html.twig');
    }
}
