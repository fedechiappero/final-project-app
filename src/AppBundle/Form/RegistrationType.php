<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')//in order to select a person
            ->add('roles', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'mapped' => false,
                'required' => true,
                'label'    => 'Tipo de usuario',
                'choices' => array(
                    'Administrador' => 'ROLE_ADMIN',
                    'Contratista' => 'ROLE_USER',
                ),
                'expanded'   => true,
            ));
    }

    //reuse fields from parent method
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}