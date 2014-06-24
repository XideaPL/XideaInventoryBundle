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
class StockDirector implements StockDirectorInterface
{
    protected $stockBuilder;
    
    protected $authorProvider;
    
    public function __construct(StockBuilderInterface $stockBuilder)
    {
        $this->stockBuilder = $stockBuilder;
    }
    
    public function build()
    {
        $this->stockBuilder->create();
        
        return $this->stockBuilder->getStock();
    }
}
