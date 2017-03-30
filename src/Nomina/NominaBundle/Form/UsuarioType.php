<?php

namespace Nomina\NominaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('cedula')
            ->add('direccion')
            ->add('telefono')
            ->add('correo', 'email');
          
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nomina\NominaBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'nomina_nominabundle_usuariotype';
    }
}
