<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface ProductInterface
{
    /**
     * Returns the product id.
     * 
     * @return string The product id
     */
    public function getId();
    
    /**
     * Sets the product sku.
     *
     * @param string $sku
     */
    public function setSku($sku);
    
    /**
     * Returns the product sku.
     *
     * @return string
     */
    public function getSku();

    /**
     * Sets the product name.
     *
     * @param string $name
     */
    public function setName($name);
    
    /**
     * Returns the product name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the product description.
     *
     * @param string $description
     */
    public function setDescription($description);
    
    /**
     * Returns the product description.
     *
     * @return string
     */
    public function getDescription();
    
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

    /**
     * @param datetime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null);

    /**
     * @return datetime
     */
    public function getCreatedAt();

    /**
     * @param datetime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null);

    /**
     * @return datetime
     */
    public function getUpdatedAt();
}
