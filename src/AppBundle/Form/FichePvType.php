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
        $builder->add('cinPass')->add('nomPass')->add('prenomPass')->add('adressePass')->add('datePv')->add('numTrain')->add('montantPv')->add('matriculeCont')->add('lieuControle')->add('classe')->add('distinationReele')->add('typeAbonn')->add('dureStationnement')->add('dateFinAbon');
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
