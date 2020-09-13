<?php

namespace App\Form;

use App\Entity\Materiel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'required' => false,
                'choices' => $this->getChoices(),
            ])
            ->add('number')
            ->add('description', null, [
                'required' => false,
                'empty_data' => 'empty',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Materiel::class,
        ]);
    }

    private function getChoices()
    {
        $choice = ['' => '', 'telephone' => 'telephone', 'pc' => 'pc', 'imprimante' => 'imprimante', 'tablette' => 'tablette'];

        return $choice;
    }
}
