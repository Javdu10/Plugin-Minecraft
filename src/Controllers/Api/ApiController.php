<?php

namespace Azuriom\Plugin\Minecraft\Controllers\Api;

use Azuriom\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Show the plugin API default page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json('Hello World!');
    }
}