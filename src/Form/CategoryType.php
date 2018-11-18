<?php
/**
 * Created by PhpStorm.
 * User: younesform
 * Date: 18/11/18
 * Time: 23:00
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use App\Entity\Category;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}