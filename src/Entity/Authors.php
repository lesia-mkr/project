<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Authors
 *
 * @ORM\Table(name="authors")
 * @ORM\Entity(repositoryClass=App\Repository\AuthorsRepository::class)
 */
class Authors
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=55, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=55, nullable=false)
     */
    private $lastName;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }


}
