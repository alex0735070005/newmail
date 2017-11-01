<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('oldPassword', PasswordType::class, ['label'=> 'Enter old password', 'attr'=>['class'=>'form-control']]);
        $builder->add('newPassword', RepeatedType::class, array(
            'type' =>  PasswordType::class,
            'invalid_message' => 'Пароли не совпадают',
            'required' => true,
            'first_options'  => array('label' => 'Enter new password', 'attr'=>['class'=>'form-control']),
            'second_options' => array('label' => 'Repeat new password', 'attr'=>['class'=>'form-control']),
            'label'=> 'New password',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Form\Model\ChangePasswordModal',
        ));
    }

}
