<?php

namespace Azuriom\Plugin\Minecraft\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Artisan;
use Azuriom\Http\Controllers\Controller;
use Azuriom\Providers\GameServiceProvider;

class AdminController extends Controller
{
    /**
     * Show the home admin page of the plugin.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $currentOrAvailableGames = GameServiceProvider::getAvailableGames();

        return view('minecraft::admin.settings', [
            'currentOrAvailableGames' => $currentOrAvailableGames,
            'route' => route('minecraft.admin.updateSettings'),
            'isAdmin' => true,
        ]);
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'type' => ['string', Rule::in(GameServiceProvider::getAvailableGames())]
        ]);

        if(setting()->has('minecraft_mc-offline_count') && $data['type'] === 'mc-online') {
            return redirect()->back()->with('error', trans('minecraft::messages.cannot-change-mc-online'));
        }

        $this->setEnv('AZURIOM_GAME', $data['type']);

        Artisan::call('config:clear');

        return redirect()->back()->with('success', 'Updated');
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
