<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model\Builder;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface StockBuilderInterface
{
    /**
     * @return void
     */
    function create();
    
    /**
     * @return \Xidea\Bundle\InventoryBundle\Model\StockInterface
     */
    function getStock();
}
