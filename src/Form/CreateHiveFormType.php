<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CreateHiveFormType extends AbstractType {


    public function buildForm(FormBuilderInterface $builder, array $options)
    {           
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'invalid_message' => 'Format invalide',
                'required' => true,
                'attr' => [
                    'class' => 'form_input',
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('geo_lat', NumberType::class, [
                'label' => 'Latitude',
                'invalid_message' => 'Format latitude invalide',
                'attr' => [
                    'class' => 'form_input',
                    'placeholder' => 'Latitude'
                ]
            ])
            ->add('geo_long', NumberType::class, [
                'invalid_message' => 'Format longitude invalide',
                'label' => 'Longitude',
                'attr' => [
                    'class' => 'form_input',
                    'placeholder' => 'Longitude'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter ruche',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
        
    }
}