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
interface InventoryItemInterface
{
    /**
     * Returns the product id.
     * 
     * @return string The product id
     */
    public function getId();
    
    /**
     * Sets the stock.
     *
     * @param StockInterface $stock
     */
    public function setStock(StockInterface $stock);
    
    /**
     * Returns the stock.
     *
     * @return StockInterface
     */
    public function getStock();

    /**
     * Sets the product.
     *
     * @param ProductInterface $product
     */
    public function setProduct(ProductInterface $product);
    
    /**
     * Returns the product.
     *
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * Sets the product qty.
     *
     * @param string $qty
     */
    public function setQty($qty);
    
    /**
     * Returns the product qty.
     *
     * @return string
     */
    public function getQty();
}
