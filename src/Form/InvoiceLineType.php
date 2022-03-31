<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/30/2022
 * Time: 11:10 PM
 */

namespace App\Form;


use App\Entity\InvoiceLine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class InvoiceLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('description',TextareaType::class,['label'=>false])
        ->add('quantity',IntegerType::class,['label'=>false])
        ->add('amount',NumberType::class,["html5"=>true,'label'=>false])
        ->add('vatAmount',NumberType::class,["html5"=>true,'label'=>false])
        ->add('totalVat',NumberType::class,["html5"=>true,'label'=>false])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>InvoiceLine::class]);

    }

}