<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items", uniqueConstraints={@ORM\UniqueConstraint(name="iditems_UNIQUE", columns={"iditems"}), @ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"}), @ORM\UniqueConstraint(name="url_UNIQUE", columns={"url"})}, indexes={@ORM\Index(name="fk_items_categories1_idx", columns={"categories_id"}), @ORM\Index(name="fk_items_items_img1_idx", columns={"items_img_id"})})
 * @ORM\Entity(repositoryClass=App\Repository\ItemsRepository::class)
 */
class Items
{
    /**
     * @var int
     *
     * @ORM\Column(name="iditems", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iditems;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=false)
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=45, nullable=false)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_id", referencedColumnName="id_categories")
     * })
     */
    private $categories;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Orders", inversedBy="itemsIditems")
     * @ORM\JoinTable(name="items_has_orders",
     *   joinColumns={
     *     @ORM\JoinColumn(name="items_iditems", referencedColumnName="iditems")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     *   }
     * )
     */
    private $orders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIditems(): ?int
    {
        return $this->iditems;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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

    /**
     * @return Collection|Orders[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        $this->orders->removeElement($order);

        return $this;
    }

}
