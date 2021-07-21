<?php

namespace App\Form;

use App\Entity\Prescription;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function date;

class NewPrescriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('doctor', TextType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Docteur',
                'mapped'=>false,
            ])
            ->add('patient', TextType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Patient',
                'mapped'=>false,
            ])
            ->add('drug', TextType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Médicament',
                'mapped'=>false,
            ])

            ->add('morning', CheckboxType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Matin',
                'mapped'=>false,
                'required'=>false
            ])
            ->add('dosagemorning', NumberType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Dosage du matin',
                'mapped'=>false,
                'required'=>false
            ])

            ->add('noon', CheckboxType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Midi',
                'mapped'=>false,
                'required'=>false
            ])
            ->add('dosagenoon', NumberType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Dosage du midi',
                'mapped'=>false,
                'required'=>false
            ])

            ->add('evening', CheckboxType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Soir',
                'mapped'=>false,
                'required'=>false
            ])
            ->add('dosageevening', NumberType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Dosage du soir',
                'mapped'=>false,
                'required'=>false
            ])

            ->add('beginning', BirthdayType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Début',
                'mapped'=>false,
                'days' => range(1,31),
                'years' =>  range(date("Y") - 5, date("Y") - 0),
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                ]
            ])
            ->add('end', BirthdayType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Fin',
                'mapped'=>false,
                'days' => range(1,31),
                'years' =>  range(date("Y") - 5, date("Y") - 0),
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                ]
            ])

            ->add('contraindication', TextareaType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Contre indication',
                'mapped'=>false,
                'required'=>false
            ])

            ->add('save', SubmitType::class,[
                'attr'=>[
                    'autocomplete'=>'off'
                ],
                'label'=>'Préscrire'
            ]);
    }

}
