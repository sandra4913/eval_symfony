<?php

namespace App\Form;

use App\Entity\Tickets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class TicketsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('auteur')
            ->add('createdAt', null, [
                'widget' => 'single_text',
                'label' => 'Créé le :',
                'disabled' => true,
            ])
            ->add('closedAt', null, [
                'widget' => 'single_text',
                'label' => 'Résolu le :'
            ])
            ->add('description')
            ->add('categorie', ChoiceType::class, [
                'choices' =>
                [
                    'Incident' => 'Incident',
                    'Panne' => 'Panne',
                    'Evolution' => 'Evolution',
                    'Anomalie' => 'Anomalie',
                    'Information' => 'Information',
                ],
                'label' => 'Catégorie',

            ])->add('statut', ChoiceType::class, [
                'choices' =>
                [
                    'Nouveau' => 'Nouveau',
                    'Ouvert' => 'Ouvert',
                    'Résolu' => 'Résolu',
                    'Fermé' => 'Fermé',
                ],
            ])
            ->add('responsable');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tickets::class,
        ]);
    }
}
