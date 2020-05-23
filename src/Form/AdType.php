<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champ !
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    private function getConfiruation($label, $placeholder, $options = []){
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
            ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfiruation("Titre", "Tapez un super titre pour votre annonce"))
            ->add('slug', TextType::class,  $this->getConfiruation("Adresse web", "Tapez l'adresse web (automatique)", [
                'required' => false
            ]),)
            ->add('coverImage', UrlType::class, $this->getConfiruation("Url de l'image", "Donnez l'adresse d'une image qui donne vraiment envie"))
            ->add('introduction', TextType::class,  $this->getConfiruation("Introduction", "Donnez une déscription global de l'annonce"))
            ->add('content', TextareaType::class, $this->getConfiruation("Déscription détaillée", "Tapez une description qui donne vraiment envie de venir chez vous"))
            ->add('rooms', IntegerType::class, $this->getConfiruation("Nombre de chambres", "Le nombre de chambres disponible"))
            ->add('price', MoneyType::class,  $this->getConfiruation("Prix par nuit", "Indiquez le prix que vous voulez pour une nuit"))
            ->add('images', CollectionType::class,[
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
