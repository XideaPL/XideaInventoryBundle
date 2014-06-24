<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Controller\Inventory;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\EventDispatcher\EventDispatcherInterface;
        
use Xidea\Bundle\InventoryBundle\Model\Builder\InventoryDirectorInterface,
    Xidea\Bundle\InventoryBundle\Model\Manager\InventoryManagerInterface,
    Xidea\Bundle\InventoryBundle\Form\Factory\FormFactoryInterface,
    Xidea\Bundle\InventoryBundle\InventoryEvents,
    Xidea\Bundle\InventoryBundle\Event\GetResponseEvent,
    Xidea\Bundle\InventoryBundle\Event\GetInventoryResponseEvent,
    Xidea\Bundle\InventoryBundle\Event\FilterInventoryResponseEvent,
    Xidea\Bundle\InventoryBundle\Event\FormEvent,
    Xidea\Bundle\InventoryBundle\Routing\RouteHandlerInterface,
    Xidea\Bundle\InventoryBundle\View\ViewHandlerInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
abstract class AbstractCreateController
{
    /*
     * @var InventoryDirectorInterface
     */
    protected $inventoryDirector;

    /*
     * @var InventoryManagerInterface
     */
    protected $inventoryManager;

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

    public function __construct(InventoryDirectorInterface $inventoryDirector, InventoryManagerInterface $inventoryManager, FormFactoryInterface $formFactory, EventDispatcherInterface $eventDispatcher, RouteHandlerInterface $routeHandler, ViewHandlerInterface $viewHandler)
    {
        $this->inventoryDirector = $inventoryDirector;
        $this->inventoryManager = $inventoryManager;
        $this->eventDispatcher = $eventDispatcher;
        $this->formFactory = $formFactory;
        $this->routeHandler = $routeHandler;
        $this->viewHandler = $viewHandler;
    }

    public function createAction(Request $request)
    {
        $event = new GetResponseEvent($request);
        $this->eventDispatcher->dispatch(InventoryEvents::CREATE_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $inventory = $this->inventoryDirector->build();

        $event = new GetInventoryResponseEvent($inventory, $request);
        $this->eventDispatcher->dispatch(InventoryEvents::PRE_CREATE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->formFactory->createForm();
        $form->setData($inventory);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $this->eventDispatcher->dispatch(InventoryEvents::CREATE_FORM_VALID, $event);

                if ($this->manager->save($inventory)) {
                    $event = new GetInventoryResponseEvent($inventory, $request);
                    $this->eventDispatcher->dispatch(InventoryEvents::CREATE_SUCCESS, $event);

                    if (null === $response = $event->getResponse()) {
                        $url = $this->routeHandler->handle('view', array(
                            'id' => $inventory->getId()
                        ));
                        $response = new RedirectResponse($url);
                    }

                    $this->eventDispatcher->dispatch(InventoryEvents::CREATE_COMPLETED, new FilterInventoryResponseEvent($inventory, $request, $response));

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
