<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/30/2022
 * Time: 11:04 PM
 */

namespace App\Form;


use App\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', IntegerType::class)
            ->add('date',DateType::class,["widget"=>'single_text'])
            ->add('customer_id',IntegerType::class)
            ->add('invoiceLines', CollectionType::class, array(
                'entry_type' => InvoiceLineType::class,
                'allow_add' => true,
                'entry_options' => ['label' => false],
            ))

            ->add('submit',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>Invoice::class]);
    }


}