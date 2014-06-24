<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Entity\Manager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Doctrine\ORM\EntityManager;
use Xidea\Bundle\InventoryBundle\Model\Manager\InventoryManagerInterface;
use Xidea\Bundle\InventoryBundle\Model\InventoryInterface;
use Xidea\Bundle\InventoryBundle\InventoryEvents;
use Xidea\Bundle\InventoryBundle\Event\InventoryEvent;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class InventoryManager implements InventoryManagerInterface
{
    /*
     * @var EntityManager
     */
    protected $entityManager;
    
    /*
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * Constructs a stock manager.
     *
     * @param EntityManager The entity manager
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher)
    {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function save(InventoryInterface $stock)
    {
        $this->eventDispatcher->dispatch(InventoryEvents::PRE_SAVE, new InventoryEvent($stock));
        
        $this->entityManager->persist($stock);

        $this->entityManager->flush();
        
        $this->eventDispatcher->dispatch(InventoryEvents::PRE_SAVE, new InventoryEvent($stock));

        return $stock->getId();
//        if($flush)
//            $this->objectManager->flush();
    }
    
    public function update(InventoryInterface $stock)
    {  
        $this->entityManager->persist($stock);

        $this->entityManager->flush();

        return $stock->getId();
//        if($flush)
//            $this->objectManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function delete(InventoryInterface $stock)
    {
        $this->entityManager->remove($stock);
//        if($flush)
//            $this->objectManager->flush();
    }

}
