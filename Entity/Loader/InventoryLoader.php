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

use Xidea\Bundle\InventoryBundle\Model\Loader\InventoryLoaderInterface,
    Xidea\Bundle\InventoryBundle\Entity\Repository\InventoryRepositoryInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class InventoryLoader implements InventoryLoaderInterface
{
    /*
     * @var InventoryRepositoryInterface
     */
    protected $inventoryRepository;
    
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
    public function __construct(InventoryRepositoryInterface $inventoryRepository, Paginator $paginator)
    {
        $this->inventoryRepository = $inventoryRepository;
        $this->paginator = $paginator;
    }

    /**
     * {@inheritdoc}
     */
    public function load($id)
    {
        return $this->inventoryRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function loadAll()
    {
        return $this->inventoryRepository->findAll();
    }

    /*
     * {@inheritdoc}
     */
    public function loadBy(array $criteria, array $orderBy = array(), $limit = null, $offset = null)
    {
        return $this->inventoryRepository->findBy($criteria, $orderBy, $limit, $offset);
    }
}
