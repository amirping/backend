<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichePvType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('datePv')
        ->add('montantPv')
        ->add('matriculeCont')
        ->add('lieuControle')
        ->add('classe')
        ->add('destinationReele')
        ->add('typeAbonn')
        ->add('dureStationnement')
        ->add('type')
        ->add('dateFinAbon')
        ->add('idPass')
        ->add('numeroTrain');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FichePv'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fichepv';
    }


}
