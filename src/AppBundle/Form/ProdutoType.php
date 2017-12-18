<?php


namespace AppBundle\Form;

use AppBundle\Entity\Produto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 *
 * @author David Ramos <davidsramos@gmail.com>
 */
class ProdutoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoProduto', TextType::class, [
                'attr' => array('class' => 'form-control', 
                                'style' => 'margin-bottom:15px',
                                'autofocus' => true),
                'label' => 'Códgo'
            ])
            ->add('nomeProduto', TextType::class, [
                'attr' => array('class' => 'form-control', 
                                'style' => 'margin-bottom:15px',
                                'autofocus' => true),
                'label' => 'Nome'
            ])
            ->add('valorProduto', NumberType::class, [
                'attr' => array('class' => 'form-control', 
                                'style' => 'margin-bottom:15px',
                                'autofocus' => true),
                'label' => 'Valor'
            ])
            ->add('save', SubmitType::class, array('label' => 'Executar', 
                                                   'attr' => array('class' => 'btn btn-primary', 
                                                                   'style' => 'margin-bottom:15px')))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produto::class,
        ]);
    }    
}