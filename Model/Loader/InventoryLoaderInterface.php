<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model\Loader;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface InventoryLoaderInterface
{
    /**
     * Returns a inventory by id.
     * 
     * @param int $id
     * 
     * @return \Xidea\Bundle\InventoryBundle\Model\InventoryItemInterface
     */
    function load($id);
    
    /**
     * Returns all inventorys.
     * 
     * @return array
     */
    function loadAll();
    
    /**
     * Returns a set of categories matching the criteria.
     * 
     * @return array
     */
    function loadBy(array $criteria, array $orderBy = array(), $limit = null, $offset = null);
}
