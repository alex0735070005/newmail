<?php
// src/AppBundle/Entity/User.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    private $username;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;
    
    /** 
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email = '';

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_up", nullable=true, type="datetime")
     */
    private $date_up;
    
    /**
     * One User has Many Ttns.
     * @ORM\OneToMany(targetEntity="Ttn", mappedBy="user")
     */
    private $ttns;
    
    public function __construct()
    {
        $this->ttns     = new ArrayCollection();
        $this->isActive = true;
        $this->roles    = serialize(['ROLE_USER']);
        $this->date_up  = new \DateTime("now");
    }
    
    public function getTtns()
    {
        return $this->ttns;
    }
    
    public function addTtn(Ttn $Ttn)
    {
        $this->ttns[] = $Ttn;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return unserialize($this->roles);
    }
    
    /**
     * Get dateUp
     *
     * @return \DateTime
     */
    public function getDateUp()
    {
        return $this->date_up;
    }
    
    /**
     * Set dateUp
     *
     * @param \DateTime $dateUp
     *
     * @return User
     */
    public function setDateUp($dateUp)
    {
        $this->date_up = $dateUp;

        return $this;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
        public function __toString() {
        return $this->username;
    }
    
    public function eraseCredentials()
    {
    }
}