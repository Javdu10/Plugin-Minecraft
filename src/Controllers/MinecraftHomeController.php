<?php

namespace Azuriom\Plugin\Minecraft\Controllers;

use Azuriom\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Artisan;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Providers\GameServiceProvider;

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

    public function settings()
    {
        abort_if(setting('minecraft_installed') == 1, 404);

        $currentOrAvailableGames = GameServiceProvider::getAvailableGames();

        return view('minecraft::admin.settings', [
            'currentOrAvailableGames' => $currentOrAvailableGames,
            'route' => route('minecraft.updateSettings'),
            'isAdmin' => false,
        ]);
    }

    public function updateSettings(Request $request)
    {
        abort_if(setting()->has('minecraft_installed'), 404);

        $data = $request->validate([
            'type' => ['string', Rule::in(GameServiceProvider::getAvailableGames())]
        ]);

        $this->setEnv('AZURIOM_GAME', $data['type']);

        Artisan::call('config:clear');
        Setting::updateSettings(['minecraft_installed' => 1]);

        return redirect()->route('home');
    }

    /**
     * https://stackoverflow.com/a/50965881
     */
    protected function setEnv($name, $value)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $name . '=' . env($name), $name . '=' . $value, file_get_contents($path)
            ));
        }
    }
}
