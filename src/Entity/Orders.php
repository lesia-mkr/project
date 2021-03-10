<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="fk_orders_customers1_idx", columns={"customer"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true, options={"default"="3"})
     */
    private $status = 3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="orderscol", type="string", length=45, nullable=true)
     */
    private $orderscol;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer", referencedColumnName="idcustomers")
     * })
     */
    private $customer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Items", mappedBy="orders")
     */
    private $itemsIditems;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->itemsIditems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getOrderscol(): ?string
    {
        return $this->orderscol;
    }

    public function setOrderscol(?string $orderscol): self
    {
        $this->orderscol = $orderscol;

        return $this;
    }

    public function getCustomer(): ?Customers
    {
        return $this->customer;
    }

    public function setCustomer(?Customers $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|Items[]
     */
    public function getItemsIditems(): Collection
    {
        return $this->itemsIditems;
    }

    public function addItemsIditem(Items $itemsIditem): self
    {
        if (!$this->itemsIditems->contains($itemsIditem)) {
            $this->itemsIditems[] = $itemsIditem;
            $itemsIditem->addOrder($this);
        }

        return $this;
    }

    public function removeItemsIditem(Items $itemsIditem): self
    {
        if ($this->itemsIditems->removeElement($itemsIditem)) {
            $itemsIditem->removeOrder($this);
        }

        return $this;
    }

}
