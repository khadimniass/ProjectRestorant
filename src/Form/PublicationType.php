<?php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('imageFile', VichImageType::class, [
            'label'=>'Image du plat (JPG,PNG,JPEG)',
            'required' => false,
            'allow_delete' => true,
            'download_label' => 'Téléccharger',
            'download_uri' => true,
            'image_uri' => true,
            'asset_helper' => true,
            'imagine_pattern'=> 'squared_thumbnail_small'
        ])
            ->add('title')
            ->add('description')
            ->add('price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
