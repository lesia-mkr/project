<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"}), @ORM\UniqueConstraint(name="url_UNIQUE", columns={"url"})})
 * @ORM\Entity(repositoryClass=App\Repository\CategoriesRepository::class)
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categories", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategories;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=50, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * 
     * @ORM\OneToMany(targetEntity=Items::class, mappedBy="categories")
     */
    private $items;

    public function getItems(): ?object
    {
        return $this->items;
    }

    public function setItems($items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity=Articles::class, mappedBy="categories")
     */
    private $articles;

    public function getArticles(): ?object
    {
        return $this->articles;
    }

    public function setArticles($articles): self
    {
        $this->articles = $articles;

        return $this;
    }

    public function getIdCategories(): ?int
    {
        return $this->idCategories;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
