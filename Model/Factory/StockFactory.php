<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model\Factory;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class StockFactory implements StockFactoryInterface
{
    protected $class;
    
    public function __construct($class)
    {
        $this->class = $class;
    }
    
    public function create()
    {
        return new $this->class;
    }
}
