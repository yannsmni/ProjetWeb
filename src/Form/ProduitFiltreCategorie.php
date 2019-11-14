<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\ProduitFiltre;
use Doctrine\DBAL\Types\StringType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitFiltreCategorie extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minPrice', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prix minimum'
                ]
            ])
            ->add('maxPrice', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prix maximum'
                ]
            ])
            ->add('category', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Categorie::class,
                'choice_label' => 'Nom',
                'multiple' => false
            ])
            ->add('bestSales', CheckboxType::class, [
                'required' => false,
                'label' => 'Meilleures ventes'
            ])
            ->add('ascPrice', CheckboxType::class, [
                'required' => false,
                'label' => 'Prix croissant'
            ])
            ->add('descPrice', CheckboxType::class, [
                'required' => false,
                'label' => 'Prix décroissant'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProduitFiltre::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}
