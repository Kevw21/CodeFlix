<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\DeviceLimitService;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

class LogoutDevice
{
    protected $deviceService;

    public function __construct(DeviceLimitService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isLogoutRequest($request)) {
            $deviceId = Session::get('device_id');
            
            if ($deviceId) {
                $this->deviceService->logoutDevice($deviceId);
            }
            session()->forget('device_id');
        }
        return $next($request);
    }

    private function isLogoutRequest(Request $request): bool
    {
        // Periksa apakah request ini adalah logout dari Laravel Fortify
        return $request->is('logout') || Route::currentRouteName() === 'logout';
    }
}
