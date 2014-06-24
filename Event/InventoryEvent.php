<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Xidea\Bundle\InventoryBundle\Model\InventoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class InventoryEvent extends Event
{
    /**
     * @var array
     */
    protected $items;
    
    /**
     * @var Request
     */
    protected $request;

    /**
     * Constructs an event.
     *
     * @param array
     */
    public function __construct($items, Request $request = null)
    {
        $this->items = $items;
        $this->request = $request;
    }

    /**
     * @return InventoryInterface
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
