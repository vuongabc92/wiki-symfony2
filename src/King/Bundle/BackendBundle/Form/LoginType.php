<?php namespace King\Bundle\BackendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('_username', 'text', array(
            'required' => false,
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'The username field can not be blank'
                ))
            )
        ));

        $builder->add('_password', 'password', array(
            'required' => false,
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'The password field can not be blank'
                ))
            )
        ));

        $builder->add('_remember_me', 'checkbox', array(
            'required' => false
        ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array());
    }

    public function getName(){
    }

}