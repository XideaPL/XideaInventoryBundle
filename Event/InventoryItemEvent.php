<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Xidea\Bundle\InventoryBundle\Model\InventoryItemInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class InventoryItemEvent extends Event
{

    /**
     * @var InventoryItemInterface
     */
    protected $item;
    
    /**
     * @var Request
     */
    protected $request;

    /**
     * Constructs an event.
     *
     * @param InventoryItemInterface $item The item
     */
    public function __construct(InventoryItemInterface $item, Request $request = null)
    {
        $this->item = $item;
        $this->request = $request;
    }

    /**
     * @return InventoryItemInterface
     */
    public function getItem()
    {
        return $this->item;
    }
    
    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}
