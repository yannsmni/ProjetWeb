<?php

namespace App\Form;

use App\Entity\UserSecurity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('nom', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('email', EmailType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [new NotBlank(), new Length([
                    'min' => 8,
                    'minMessage' => "Veuillez saisir un mot de passe supèrieur à 8 caractères"])
            ]])
            ->add('confirm_password', PasswordType::class, [
                'constraints' => [new NotBlank()
            ]])
            ->add('localisation', TextType::class, [
                'constraints' => new NotBlank(),
            ])    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // $resolver->setDefaults([
        //     'data_class' => UserSecurity::class,
        // ]);
    }
}
