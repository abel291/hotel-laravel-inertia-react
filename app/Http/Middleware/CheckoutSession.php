<?php

namespace App\Http\Middleware;

use App\Enums\CartEnum;
use App\Services\CartService;
use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckoutSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!session()->has(['reservation', 'room', 'charge'])) {
            return to_route('home')->with(['error' => 'El tiempo en el chekout ha terminado']);
        }

        return $next($request);
    }
}
