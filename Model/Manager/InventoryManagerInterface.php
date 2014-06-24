<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model\Manager;

use Xidea\Bundle\InventoryBundle\Model\InventoryItemInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface InventoryManagerInterface
{
    /**
     * Saves an inventory item.
     * 
     * @param InventoryItemInterface $item
     */
    function save(InventoryItemInterface $item);

    /**
     * Updates a inventory.
     * 
     * @param InventoryItemInterface $item
     */
    function update(InventoryItemInterface $item);

    /**
     * Deletes a inventory.
     * 
     * @param InventoryItemInterface $item
     */
    function delete(InventoryItemInterface $item);
}
