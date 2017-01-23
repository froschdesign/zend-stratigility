<?php
/**
 * @link      https://github.com/zendframework/zend-stratigility for the canonical source repository
 * @copyright Copyright (c) 2016-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://framework.zend.com/license New BSD License
 */

namespace Zend\Stratigility\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as InteropMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class CallableInteropMiddlewareWrapper implements InteropMiddlewareInterface
{
    /**
     * @param callable
     */
    private $middleware;

    /**
     * @param callable $middleware
     */
    public function __construct(callable $middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * {@inheritDocs}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $middleware = $this->middleware;
        return $middleware($request, $delegate);
    }
}
