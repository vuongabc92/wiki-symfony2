<?php

namespace King\Bundle\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Asset;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'required' => true,
                'constraints' => array(
                    new Asset\NotBlank(array(
                        'message' => 'The field username can not be blank'
                    )),
                    new Asset\Length(array(
                        'min' => '2',
                        'max' => '32',
                        'minMessage' => 'The username field is too short',
                        'maxMessage' => 'The username field is too long'
                    )),
                )
            ))
            ->add('password')
            ->add('email')
            ->add('isActive')
            ->add('created')
            ->add('modified')
            ->add('roles')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'King\Bundle\BackendBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'king_bundle_backendbundle_user';
    }
}
