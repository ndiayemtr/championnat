<?php

namespace Championnat\sunuChampionnatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RencontreType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dateMatch')
                ->add('heureDebut')
                ->add('heureFin')
                ->add('equipes', EntityType::class, 
                        array('class' => 'Championnat\sunuChampionnatBundle\Entity\Equipe',
                            'label' => 'Choisir équipe',
                    //'expanded' => true,
                    'multiple' => true,
                            ))
//                ->add( 'equipes', EntityType::class, [
//                    'class' => 'sunuChampionnatBundle:Equipe',
//                    'choice' => 'nomEquipe',
//                    'label' => 'Choisir équipe',
//                    'expanded' => true,
//                    'multiple' => true,
//                        ])
            ->add('save',             SubmitType::class, array( 'label' =>'Programmer le match'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Championnat\sunuChampionnatBundle\Entity\Rencontre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'championnat_sunuchampionnatbundle_rencontre';
    }

}
