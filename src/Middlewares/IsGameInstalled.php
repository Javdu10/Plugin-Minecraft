<?php

namespace Azuriom\Plugin\Minecraft\Middlewares;

use Closure;

class IsGameInstalled
{
    public function handle($request, Closure $next)
    {
        if(!setting()->has('minecraft_installed') && !$request->is('minecraft/configure'))
            return redirect()->route('minecraft.settings');
        
        return $next($request);
    }
}