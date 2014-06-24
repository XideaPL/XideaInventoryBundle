<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Controller\Stock;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Xidea\Bundle\InventoryBundle\Model\Loader\StockLoaderInterface,
    Xidea\Bundle\InventoryBundle\View\ViewHandlerInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
abstract class AbstractListController
{
    /*
     * @var StockLoaderInterface
     */
    protected $stockLoader;

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

    public function __construct(StockLoaderInterface $stockLoader, EventDispatcherInterface $eventDispatcher, ViewHandlerInterface $viewHandler)
    {
        $this->stockLoader = $stockLoader;
        $this->eventDispatcher = $eventDispatcher;
        $this->viewHandler = $viewHandler;
    }

    public function listAction()
    {
        $stocks = $this->stockLoader->loadAll();

        return $this->viewHandler->handle('list', array(
                    'stocks' => $stocks
        ));
    }

}
