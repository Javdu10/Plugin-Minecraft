<?php

namespace Azuriom\Plugin\Minecraft\Games;

use Azuriom\Games\Game;
use Azuriom\Plugin\Minecraft\Games\Servers\AzLink;
use Azuriom\Plugin\Minecraft\Games\Servers\Ping;
use Azuriom\Plugin\Minecraft\Games\Servers\Rcon;

abstract class AbstractMinecraftGame extends Game
{
    public function name()
    {
        return 'Minecraft';
    }

    public function getSupportedServers()
    {
        return [
            'mc-ping' => Ping::class,
            'mc-rcon' => Rcon::class,
            'mc-azlink' => AzLink::class,
        ];
    }

    public function trans(string $key, array $placeholders = [])
    {
        return trans('minecraft::game.minecraft.'.$key, $placeholders);
    }

    public function isExtensionCompatible(array $supportedGames)
    {
        if (parent::isExtensionCompatible($supportedGames)) {
            return true;
        }

        return in_array('minecraft', $supportedGames, true);
    }

    public function getServerCreateView()
    {
        return 'minecraft::admin.servers.create';
    }

    public function getServerEditView()
    {
        return 'minecraft::admin.servers.edit';
    }
}
