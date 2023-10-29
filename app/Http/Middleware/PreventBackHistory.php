<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;


class PreventBackHistory
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Return the response if it is a RedirectResponse
        return $response instanceof RedirectResponse ? $response : $this->addCacheControlHeaders($response);
    }

    protected function addCacheControlHeaders(Response $response): Response
    {
        return $response
            ->header("Cache-Control", "nocache, no-store, max-age=0, must-revalidate")
            ->header("Pragma", "no-cache")
            ->header("Expires", "Sun, 02 Jan 1990 00:00:00 GMT");
    }
}
