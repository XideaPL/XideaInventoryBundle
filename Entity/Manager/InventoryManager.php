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
use Xidea\Bundle\InventoryBundle\Model\InventoryItemInterface;
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
     * Constructs a inventory manager.
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
    public function save(InventoryItemInterface $item)
    {
        $this->eventDispatcher->dispatch(InventoryEvents::ITEM_PRE_SAVE, new InventoryEvent($item));
        
        $this->entityManager->persist($item);

        $this->entityManager->flush();
        
        $this->eventDispatcher->dispatch(InventoryEvents::ITEM_PRE_SAVE, new InventoryEvent($item));

        return $item->getId();
//        if($flush)
//            $this->objectManager->flush();
    }
    
    public function update(InventoryItemInterface $item)
    {  
        $this->entityManager->persist($item);

        $this->entityManager->flush();

        return $item->getId();
//        if($flush)
//            $this->objectManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function delete(InventoryItemInterface $item)
    {
        $this->entityManager->remove($item);
//        if($flush)
//            $this->objectManager->flush();
    }

}
