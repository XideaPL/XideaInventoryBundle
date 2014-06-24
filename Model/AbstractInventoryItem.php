<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
abstract class AbstractInventoryItem implements InventoryItemInterface
{
    /*
     * @var int
     */
    protected $id;
    
    /*
     * @var StockInterface
     */
    protected $stock;
    
    /*
     * @var ProductInterface
     */
    protected $product;
    
    /*
     * @var integer
     */
    protected $qty;
    
    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @inheritDoc
     */
    public function setStock(StockInterface $stock)
    {
        $this->stock = $stock;
    }
    
    /**
     * @inheritDoc
     */
    public function getStock()
    {
        return $this->stock;
    }
    
    /**
     * @inheritDoc
     */
    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
    }
    
    /**
     * @inheritDoc
     */
    public function getProduct()
    {
        return $this->product;
    }
    
    /**
     * @inheritDoc
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @inheritDoc
     */
    public function getQty()
    {
        return $this->qty;
    }
}
