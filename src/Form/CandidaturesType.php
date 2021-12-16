<?php

namespace App\Form;

use App\Entity\Candidatures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;


class CandidaturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom ',
                ])
            ->add('presentation', TextareaType::class, [
                'constraints' => [
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Le contenu doit contenir au moins 1 caractère',
                        'max' => 500,
                        'maxMessage' => 'Le contenu doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('experiences', TextareaType::class, [
                'constraints' => [
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Le contenu doit contenir au moins 1 caractère',
                        'max' => 500,
                        'maxMessage' => 'Le contenu doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('posatlcode', TextType::class, [
                'label' => 'Code Postal ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner code postal'
                    ]),
                    new Regex([
                        'pattern' => "/^[0-9]{5}$/",
                        'message' => 'Votre code postal est incorrect '
                    ]),
                ]
            ])
            ->add('adresse', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner une address'
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'L\' address doit contenir au moins {{ limit }} caractères',
                        'max' => 150,
                        'maxMessage' => 'L\' address doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'prénom ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un prénom'
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'L\' address doit contenir au moins {{ limit }} caractères',
                        'max' => 50,
                        'maxMessage' => 'L\' address doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('groupename', TextType::class, [
                'label' => 'Nom de votre groupe ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un nom de groupe'
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'L\' address doit contenir au moins {{ limit }} caractères',
                        'max' => 100,
                        'maxMessage' => 'L\' address doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('producteur', TextType::class, [
                'label' => 'Nom du producteur ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un producteur'
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'L\' address doit contenir au moins {{ limit }} caractères',
                        'max' => 150,
                        'maxMessage' => 'L\' address doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('manager', TextType::class, [
                'label' => 'Nom du manager',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un manager'
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'L\' address doit contenir au moins {{ limit }} caractères',
                        'max' => 50,
                        'maxMessage' => 'L\' address doit contenir au maximum {{ limit }} caractères'
                    ]),
                ]
            ])
            ->add('phone', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un numéro de téléphone'
                    ]),
                    new Regex([
                        'pattern' => "/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/",
                        'message' => 'Votre numéro est incorrect '
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'no-reply@bdt.fr'
                ],
                'constraints' => [
                    new Email([
                        'message' => 'L\'adresse email {{ value }} n\'est pas une adresse valide'
                    ]),
                    new NotBlank([
                        'message' => 'Merci de renseigner une adresse email'
                    ]),
                ]
            ])
            ->add('Vadider', SubmitType::class, [
                'label' => 'Enregistrer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidatures::class,
        ]);
    }
}
