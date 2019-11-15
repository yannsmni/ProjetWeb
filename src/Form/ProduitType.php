<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom du produit'
                ]
            ])
            ->add('Description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Description du produit'
                ]
            ])
            ->add('Prix', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Prix du produit'
                ]
            ]) 
            ->add('imageFile', FileType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Image du produit'
                ]
            ])
            ->add('quantite_vendu', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Quantité vendue'
                ]
            ]) 
            ->add('Categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom',
                'attr' => [
                    'placeholder' => 'Catégorie'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }

    public function getBlockPrefix() {
        return '';
    }
}
