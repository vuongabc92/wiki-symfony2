<?php

namespace King\Bundle\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array(
                'required' => true,
                'max_length' => 128,
                'trim' => true,
                'error_bubbling' => true,
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'The email field can not be blank.'
                    )),
                    new Assert\Length(array(
                        'min' => 8,
                        'max' => 128,
                        'minMessage' => 'The email field is too short. It should have {{ limit }} character or more.',
                        'maxMessage' => 'The email field is too long. It should have {{ limit }} character or less.',
                    )),
                    new Assert\Email(array(
                        'message' => 'The email field is not a valid email address.',
                        'checkMX' => false
                    ))
                )
            ))
            ->add('fullName', 'text', array(
                'required' => true,
                'max_length' => 64,
                'trim' => true,
                'error_bubbling' => true,
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'The full name field can not be blank.'
                    )),
                    new Assert\Length(array(
                        'min' => 4,
                        'max' => 64,
                        'minMessage' => 'The full name field is too short. It should have {{ limit }} character or more.',
                        'maxMessage' => 'The full name field is too long. It should have {{ limit }} character or less.',
                    ))
                )
            ))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'error_bubbling' => true,
                'invalid_message' => 'The password comfirmation field must match.',
                'required' => true,
                'max_length' => 64,
                'trim' => true,
                'constraints' => array(
                    new Assert\Length(array(
                        'min' => 6,
                        'max' => 64,
                        'minMessage' => 'The password field is too short. It should have {{ limit }} character or more.',
                        'maxMessage' => 'The password field is too long. It should have {{ limit }} character or less.',
                    )),
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'King\Bundle\CommonBundle\Entity\User',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kingfrontbundle_user';
    }
}
