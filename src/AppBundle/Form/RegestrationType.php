<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('matricule');
        // $builder->add('tel');
        // $builder->add('nom');
        // $builder->add('prenom');
        // $builder->add('cin');
        // $builder->add('adresse');
    }

    public function getParent()
    {
         return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
}