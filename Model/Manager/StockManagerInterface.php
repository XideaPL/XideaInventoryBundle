<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model\Manager;

use Xidea\Bundle\InventoryBundle\Model\StockInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface StockManagerInterface
{
    /**
     * Saves a stock.
     * 
     * @param StockInterface $stock
     */
    function save(StockInterface $stock);

    /**
     * Updates a stock.
     * 
     * @param StockInterface $stock
     */
    function update(StockInterface $stock);

    /**
     * Deletes a stock.
     * 
     * @param StockInterface $stock
     */
    function delete(StockInterface $stock);
}
