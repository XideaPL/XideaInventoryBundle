<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Xidea\Bundle\InventoryBundle\Model\StockInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class StockEvent extends Event
{

    /**
     * @var StockInterface
     */
    protected $stock;
    
    /**
     * @var Request
     */
    protected $request;

    /**
     * Constructs an event.
     *
     * @param StockInterface $stock The stock
     */
    public function __construct(StockInterface $stock, Request $request = null)
    {
        $this->stock = $stock;
        $this->request = $request;
    }

    /**
     * @return StockInterface
     */
    public function getStock()
    {
        return $this->stock;
    }
    
    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}
