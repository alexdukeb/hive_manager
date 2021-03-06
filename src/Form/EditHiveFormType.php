<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EditHiveFormType extends AbstractType {


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'hive_name' => false,
            'hive_geo_lat' => false,
            'hive_geo_long' => false
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {           
        if($options['hive_name'] && $options['hive_geo_lat'] && $options['hive_geo_long']) {
            $builder
                ->add('name', TextType::class, [
                    'label' => 'Nom',
                    'data' => $options['hive_name'],
                    'required' => true,
                    'attr' => [
                        'class' => 'form_input',
                        'placeholder' => 'Nom'
                    ]
                ])
                ->add('geo_lat', NumberType::class, [
                    'data' => $options['hive_geo_lat'],
                    'label' => 'Latitude',
                    'attr' => [
                        'class' => 'form_input',
                        'placeholder' => 'Latitude'
                    ]
                ])
                ->add('geo_long', NumberType::class, [
                    'data' => $options['hive_geo_long'],
                    'label' => 'Longitude',
                    'attr' => [
                        'class' => 'form_input',
                        'placeholder' => 'Longitude'
                    ]
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Enregistrer les modifications',
                    'attr' => [
                        'class' => 'btn btn-primary'
                    ]
                ]);
        }
    }
}