<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true, options={"comment": "用户名"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64, options={"comment": "用户密码"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=18, nullable=true, options={"comment": "身份证"})
     */
    private $idCard;

    /**
     * @ORM\Column(type="string", length=100, nullable=true, options={"comment": "名称"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=11, nullable=true, options={"comment": "手机号码"})
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=100, nullable=true, options={"comment": "昵称"})
     */
    private $nickname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"comment": "用户头像"})
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"comment": "个性签名"})
     */
    private $bio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIdCard(): ?string
    {
        return $this->idCard;
    }

    public function setIdCard(string $idCard): self
    {
        $this->idCard = $idCard;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
        ]);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        return list(
                $this->id,
                $this->username,
                $this->password,
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
    }
}
