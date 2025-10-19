<?php

namespace App\Form;

use App\Entity\Servicio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ServicioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre del Servicio*',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ej: Baño para perro']
            ])
            ->add('descripcion', TextareaType::class, [
                'label' => 'Descripción*',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Describe el servicio...']
            ])
            ->add('precio', IntegerType::class, [
                'label' => 'Precio ($)*',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ej: 15000']
            ])
            ->add('fecha', DateType::class, [
                'label' => 'Fecha*',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('hora', TimeType::class, [
                'label' => 'Hora*',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('pagado', CheckboxType::class, [
                'label' => 'Pagado',
                'required' => false,
                'attr' => ['class' => 'form-check-input']
            ])
            ->add('categoria', ChoiceType::class, [
                'label' => 'Categoría',
                'choices' => [
                    'Básico' => 'Básico',
                    'Premium' => 'Premium',
                    'VIP' => 'VIP'
                ],
                'attr' => ['class' => 'form-select']
            ])
            ->add('urlImagen', UrlType::class, [
                'label' => 'URL de Imagen',
                'required' => false,
                'attr' => ['class' => 'form-control', 'placeholder' => 'https://ejemplo.com/imagen.jpg']
            ])
            ->add('cantidad', IntegerType::class, [
                'label' => 'Cantidad',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ej: 10']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Servicio::class,
        ]);
    }
}