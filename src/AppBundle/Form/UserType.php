<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $roleofCurrent = $options['role'];
        $choiceComercial = [
            'ROLE_CONTROLLEUR' => 'ROLE_USER'
        ];
        $choiceOther = [
            'ROLE_CONTROLLEUR' => 'ROLE_USER',
            'ROLE_ADMIN_COMMERCIAL' => 'ROLE_ADMIN_COMMERCIAL',
            'ROLE_ADMIN_JUREDIQUE' => 'ROLE_ADMIN_JUREDIQUE',
            'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN',
        ];
        $choice_to_show;
        if ($roleofCurrent == "COMMERCIAL") {
            $choice_to_show = $choiceComercial;
        }
        else{
            $choice_to_show = $choiceOther;
        }
        $builder->add('matricule')->add('nom')->add('prenom')->add('adresse')->add('cin')->add('tel')
        ->add('email', EmailType::class, array('label' => 'E-mail', 'translation_domain' => 'FOSUserBundle'))
        ->add('username', null, array('label' => 'Nom D`Utilisateur', 'translation_domain' => 'FOSUserBundle'))
        ->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            'options' => array(
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'autocomplete' => 'new-password',
                ),
            ),
            'first_options' => array('label' => 'Mot De Passe'),
            'second_options' => array('label' => 'Confirmation MDP'),
            'invalid_message' => 'fos_user.password.mismatch',
        ))
        ->add('roles', ChoiceType::class, [
            'multiple' => true,
            'choices' => $choice_to_show
        ]);
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'role' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }

    /* get all roles*/
 /*   public function getExistingRoles()
{
    $roleHierarchy = $container->getParameter('security.role_hierarchy.roles');
    $roles = array_keys($roleHierarchy);

    foreach ($roles as $role) {
        $theRoles[$role] = $role;
    }
    return $theRoles;
}*/


}
