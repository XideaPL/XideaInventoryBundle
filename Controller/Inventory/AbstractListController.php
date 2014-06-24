<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Controller\Inventory;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Xidea\Bundle\InventoryBundle\Model\Loader\InventoryLoaderInterface,
    Xidea\Bundle\InventoryBundle\View\ViewHandlerInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
abstract class AbstractListController
{
    /*
     * @var InventoryLoaderInterface
     */
    protected $inventoryLoader;

    /*
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /*
     * @var ViewHandlerInterface
     */
    protected $viewHandler;

    /*
     * @var TranslatorInterface
     */
    protected $translator;

    public function __construct(InventoryLoaderInterface $inventoryLoader, EventDispatcherInterface $eventDispatcher, ViewHandlerInterface $viewHandler)
    {
        $this->inventoryLoader = $inventoryLoader;
        $this->eventDispatcher = $eventDispatcher;
        $this->viewHandler = $viewHandler;
    }

    public function listAction()
    {
        $inventory = $this->inventoryLoader->loadAll();

        return $this->viewHandler->handle('list', array(
                    'inventory' => $inventory
        ));
    }

}
