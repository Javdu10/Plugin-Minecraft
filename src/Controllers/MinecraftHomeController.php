<?php

namespace Azuriom\Plugin\Minecraft\Controllers;

use Azuriom\Http\Controllers\Controller;

class MinecraftHomeController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('minecraft::index');
    }
}
