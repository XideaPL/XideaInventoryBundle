<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Xidea\Bundle\InventoryBundle\Model\ProductInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class ProductEvent extends Event
{

    /**
     * @var ProductInterface
     */
    protected $product;
    
    /**
     * @var Request
     */
    protected $request;

    /**
     * Constructs an event.
     *
     * @param ProductInterface $product The product
     */
    public function __construct(ProductInterface $product, Request $request = null)
    {
        $this->product = $product;
        $this->request = $request;
    }

    /**
     * @return ProductInterface
     */
    public function getProduct()
    {
        return $this->product;
    }
    
    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}
