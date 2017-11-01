<?php

namespace AppBundle\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePasswordModel
{
    /**
     * @SecurityAssert\UserPassword(
     *     message = "Не верный ваш текущий пароль"
     * )
     */
    private $oldPassword = '';
     
   /**
     * @Assert\Length(
     *     min = 6,
     *     minMessage = "Пароль должен быть не меньше 6 символов"
     * )
     */
   private $newPassword = '';
     
     
    public function getOldPassword(){
        
        return $this->oldPassword;
    }
    
    public function setOldPassword($pass){
        
        $this->oldPassword = $pass;
        return $this;
    }
    
    public function getNewPassword(){
        return $this->newPassword;
    }
    
    public function setNewPassword($pass){
        
        $this->newPassword = $pass;
        return $this;
    }
}