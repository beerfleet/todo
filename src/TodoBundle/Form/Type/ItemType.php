<?php

/*
 * Todo item form
 */

namespace TodoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * Todo Item
 *
 * @author jan
 */
class ItemType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class)
                ->add('todoDate', TextType::class, ['attr' => ['readonly' => 'readonly']])
                ->add('description', TextareaType::class, ['attr' => ['rows' => '10']])
                ->add('save', SubmitType::class, ['attr' => ['class' => 'form-control']]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'TodoBundle\Entity\TodoItem',
        ));
    }

}
