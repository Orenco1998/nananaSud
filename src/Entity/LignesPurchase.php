<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LignesPurchase
 *
 * @ORM\Table(name="lignes_purchase", indexes={@ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="purchase_id", columns={"purchase_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\LignesPurchaseRepository")
 */
class LignesPurchase
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var Product|null
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var Purchase|null
     *
     * @ORM\ManyToOne(targetEntity="Purchase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="purchase_id", referencedColumnName="id")
     * })
     */
    private $purchase;


}
