<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class User
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @ORM\Column(name="nickname", type="string", length=255)
     * @Assert\Length(min=4)
     * @Assert\NotBlank()
     */
    private $nickname;

    /**
     * @ORM\Column(name="password", type="string")
     * @Assert\Length(min=6)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(name="email", type="text")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var integer
     */
    private $nbVideo;

    /**
     * @ORM\Column(name="date")
     * @Assert\DateTime()
     */
    private $date;


    /**
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = sha1($password);

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nbVideo
     *
     * @param integer $nbVideo
     * @return User
     */
    public function setNbVideo($nbVideo)
    {
        $this->nbVideo = $nbVideo;

        return $this;
    }

    /**
     * Get nbVideo
     *
     * @return integer 
     */
    public function getNbVideo()
    {
        return $this->nbVideo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return User
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
