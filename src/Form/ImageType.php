<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('imageFile', FileType::class, [
            'required' => true,
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre image'
            ]
        ])
        ->add('Description', TextType::class, [
            'required' => true,
            'label' => false,
            'attr' => [
                'placeholder' => "Description de l'image"
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }

    public function getBlockPrefix() {
        return '';
    }
}
