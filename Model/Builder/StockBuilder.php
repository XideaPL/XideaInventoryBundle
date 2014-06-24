<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Model\Builder;

use Xidea\Bundle\InventoryBundle\Model\Factory\StockFactoryInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class StockBuilder implements StockBuilderInterface
{
    /**
     * Currently built stock.
     *
     * @var StockInterface
     */
    protected $stock;

    /**
     * Stock factory.
     *
     * @var StockFactoryInterface
     */
    protected $factory;

    public function __construct(StockFactoryInterface $stockFactory)
    {
        $this->factory = $stockFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->stock = $this->factory->create();
    }

    /**
     * {@inheritdoc}
     */
    public function getStock()
    {
        return $this->stock;
    }
}
