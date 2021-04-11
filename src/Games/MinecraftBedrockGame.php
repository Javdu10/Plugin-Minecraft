<?php

namespace Azuriom\Plugin\Minecraft\Games;

use Azuriom\Games\Game;
use Azuriom\Plugin\Minecraft\Games\Servers\AzLink;
use Azuriom\Plugin\Minecraft\Games\Servers\BedrockPing;
use Azuriom\Plugin\Minecraft\Games\Servers\BedrockRcon;
use Azuriom\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MinecraftBedrockGame extends Game
{
    public function name()
    {
        return 'Minecraft Bedrock';
    }

    public function id()
    {
        return 'mc-bedrock';
    }

    public function getAvatarUrl(User $user, int $size = 64)
    {
        return Arr::get($this->getUserProfile($user), 'gamerpic', function () {
            return asset('img/user.png');
        });
    }

    public function getUserUniqueId(string $name)
    {
        return Cache::remember("users.{$name}.xbox", now()->addMinutes(15), function () use ($name) {
            $response = Http::get("https://xbox-api.azuriom.com/profiles/search/{$name}");

            return $response->throw()->json('xuid');
        });
    }

    public function getUserName(User $user)
    {
        return Arr::get($this->getUserProfile($user), 'gamertag');
    }

    public function getSupportedServers()
    {
        return [
            'bedrock-ping' => BedrockPing::class,
            'bedrock-rcon' => BedrockRcon::class,
            'mc-azlink' => AzLink::class,
        ];
    }

    public function getUserProfile(User $user)
    {
        return Cache::remember("users.{$user->id}.xbox", now()->addMinutes(15), function () use ($user) {
            $response = Http::get('https://xbox-api.azuriom.com/profiles/'.$user->game_id);

            return $response->json() ?? [];
        });
    }

    public function trans(string $key, array $placeholders = [])
    {
        return trans('minecraft::game.minecraft_bedrock.'.$key, $placeholders);
    }
}
