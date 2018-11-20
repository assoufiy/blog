<?php
/**
 * Created by PhpStorm.
 * User: younesform
 * Date: 20/11/18
 * Time: 21:57
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use App\Entity\Article;
use App\Entity\Category;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;





class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('content');
        $builder->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'name',
        ]);

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}