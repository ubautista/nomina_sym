<?php

namespace Nomina\NominaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NominaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sueldo_base')
            ->add('pension')
            ->add('eps')
            ->add('valor_devengado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nomina\NominaBundle\Entity\Nomina'
        ));
    }

    public function getName()
    {
        return 'nomina_nominabundle_nominatype';
    }
}
