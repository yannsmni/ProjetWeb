<?php

namespace App\Form;

use App\Entity\UserSecurity;
use Webmozart\Assert\Assert;
use App\Security\User\WebserviceUser;
use App\Controller\SecurityController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
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
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
            ->add('localisation', TextType::class)    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WebserviceUser::class,
        ]);
    }

    public function getBlockPrefix() {
        return '';
    }
}
