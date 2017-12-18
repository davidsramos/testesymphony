<?php


namespace AppBundle\Form;

use AppBundle\Entity\Venda;
use AppBundle\Entity\Pessoa;
use AppBundle\Repository\PessoaRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 *
 * @author David Ramos <davidsramos@gmail.com>
 */
class VendaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('clientes', ChoiceType::class, 
                        array('choices' => array('Low'=>'Low', 'Normal'=>'Normal', 'High'=>'High'), 
                              'attr' => array('class' => 'form-control', 
                                              'style' => 'margin-bottom:15px')))
            ->add('numero', IntegerType::class, [
                'attr' => array('class' => 'form-control', 
                                'style' => 'margin-bottom:15px',
                                'autofocus' => true),
                'label' => 'Numero'
            ])
            ->add('total', NumberType::class, [
                'attr' => array('class' => 'form-control', 
                                'style' => 'margin-bottom:15px',
                                'autofocus' => true),
                'label' => 'Valor Total'
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
            'data_class' => Venda::class,
        ]);
    }    
}