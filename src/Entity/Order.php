<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public ?int $id = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    public ?int $total_amount = null;

    /**
     * @ORM\Column(type="string", length=10)
     */
    public ?string $currency = null;

    /**
     * @ORM\OneToMany(targetEntity=OrderItem::class, mappedBy="parentOrder")
     */
    public ArrayCollection $orderItems;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
    }

    public function addOrderItem(OrderItem $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->parentOrder = $this;
        }

        return $this;
    }
}
