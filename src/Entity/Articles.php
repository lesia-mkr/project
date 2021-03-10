<?php

namespace App\Entity;

use App\Entity\Articles;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", uniqueConstraints={@ORM\UniqueConstraint(name="url_UNIQUE", columns={"url"})}, indexes={@ORM\Index(name="fk_articles_authors_idx", columns={"authors_name"}), @ORM\Index(name="fk_articles_categories1_idx", columns={"categories_id"})})
 * @ORM\Entity(repositoryClass=App\Repository\ArticlesRepository::class)
 */
class Articles
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=0, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=false)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date", nullable=false)
     */
    private $created;

    /**
     * @var \Authors
     *
     * @ORM\ManyToOne(targetEntity="Authors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authors_name", referencedColumnName="name")
     * })
     */
    private $authorsName;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_id", referencedColumnName="id_categories")
     * })
     */
    private $categories;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

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

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getAuthorsName(): ?Authors
    {
        return $this->authorsName;
    }

    public function setAuthorsName(?Authors $authorsName): self
    {
        $this->authorsName = $authorsName;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }


}
