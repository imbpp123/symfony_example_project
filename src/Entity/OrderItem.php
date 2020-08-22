<?php

namespace App\Entity;

use App\Repository\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderItemRepository::class)
 */
class OrderItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public ?int $id = null;

    /**
     * @ORM\Column(type="integer")
     */
    public ?int $amount = null;

    /**
     * @ORM\Column(type="string", length=10)
     */
    public ?string $currency = null;

    /**
     * @ORM\Column(type="integer")
     */
    public ?int $productId = null;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    public ?Order $parentOrder = null;
}
