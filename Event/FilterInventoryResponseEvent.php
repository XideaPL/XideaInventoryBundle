<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Bundle\InventoryBundle\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class FilterInventoryResponseEvent extends InventoryEvent
{

    private $response;

    public function __construct($items, Request $request, Response $response)
    {
        parent::__construct($items, $request);
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

}
