<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Controller\Stock;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\EventDispatcher\EventDispatcherInterface;
        
use Xidea\Bundle\InventoryBundle\Model\Builder\StockDirectorInterface,
    Xidea\Bundle\InventoryBundle\Model\Manager\StockManagerInterface,
    Xidea\Bundle\InventoryBundle\Form\Factory\FormFactoryInterface,
    Xidea\Bundle\InventoryBundle\StockEvents,
    Xidea\Bundle\InventoryBundle\Event\GetResponseEvent,
    Xidea\Bundle\InventoryBundle\Event\GetStockResponseEvent,
    Xidea\Bundle\InventoryBundle\Event\FilterStockResponseEvent,
    Xidea\Bundle\InventoryBundle\Event\FormEvent,
    Xidea\Bundle\InventoryBundle\Routing\RouteHandlerInterface,
    Xidea\Bundle\InventoryBundle\View\ViewHandlerInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
abstract class AbstractCreateController
{
    /*
     * @var StockDirectorInterface
     */
    protected $stockDirector;

    /*
     * @var StockManagerInterface
     */
    protected $stockManager;

    /*
     * @var FormFactoryInterface
     */
    protected $formFactory;
    
    /*
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;
    
    /*
     * @var RouteHandlerInterface
     */
    protected $routeHandler;

    /*
     * @var ViewHandlerInterface
     */
    protected $viewHandler;

    /*
     * @var array
     */
    protected $options;

    public function __construct(StockDirectorInterface $stockDirector, StockManagerInterface $stockManager, FormFactoryInterface $formFactory, EventDispatcherInterface $eventDispatcher, RouteHandlerInterface $routeHandler, ViewHandlerInterface $viewHandler)
    {
        $this->stockDirector = $stockDirector;
        $this->stockManager = $stockManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->formFactory = $formFactory;
        $this->routeHandler = $routeHandler;
        $this->viewHandler = $viewHandler;
    }

    public function createAction(Request $request)
    {
        $event = new GetResponseEvent($request);
        $this->eventDispatcher->dispatch(StockEvents::CREATE_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $stock = $this->stockDirector->build();

        $event = new GetStockResponseEvent($stock, $request);
        $this->eventDispatcher->dispatch(StockEvents::PRE_CREATE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->formFactory->createForm();
        $form->setData($stock);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $this->eventDispatcher->dispatch(StockEvents::CREATE_FORM_VALID, $event);

                if ($this->manager->save($stock)) {
                    $event = new GetStockResponseEvent($stock, $request);
                    $this->eventDispatcher->dispatch(StockEvents::CREATE_SUCCESS, $event);

                    if (null === $response = $event->getResponse()) {
                        $url = $this->routeHandler->handle('view', array(
                            'id' => $stock->getId()
                        ));
                        $response = new RedirectResponse($url);
                    }

                    $this->eventDispatcher->dispatch(StockEvents::CREATE_COMPLETED, new FilterStockResponseEvent($stock, $request, $response));

                    return $response;
                }
            }
        }

        return $this->viewHandler->handle('create', array(
                    'form' => $form->createView()
        ));
    }

    public function createFormAction()
    {
        $form = $this->formFactory->createForm();

        return $this->viewHandler->handle('create_form', array(
                    'form' => $form->createView()
        ));
    }
}
