<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Entity\Loader;

use Doctrine\ORM\EntityManager;

use Knp\Component\Pager\Paginator;

use Xidea\Bundle\InventoryBundle\Model\Loader\StockLoaderInterface,
    Xidea\Bundle\InventoryBundle\Entity\Repository\StockRepositoryInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class StockLoader implements StockLoaderInterface
{
    /*
     * @var StockRepositoryInterface
     */
    protected $stockRepository;
    
    /*
     * @var Paginator
     */
    protected $paginator;
    
    /**
     * Constructs a comment repository.
     *
     * @param string $class The class
     * @param EntityManager The entity manager
     */
    public function __construct(StockRepositoryInterface $stockRepository, Paginator $paginator)
    {
        $this->stockRepository = $stockRepository;
        $this->paginator = $paginator;
    }

    /**
     * {@inheritdoc}
     */
    public function load($id)
    {
        return $this->stockRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function loadAll()
    {
        return $this->stockRepository->findAll();
    }

    /*
     * {@inheritdoc}
     */
    public function loadBy(array $criteria, array $orderBy = array(), $limit = null, $offset = null)
    {
        return $this->stockRepository->findBy($criteria, $orderBy, $limit, $offset);
    }
}
