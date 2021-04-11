<?php

namespace Azuriom\Plugin\Minecraft\Observers;

use Azuriom\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $ban)
    {
        $game = config('azuriom.game');
        $settings = setting();

        if( $game === 'mc-offline')
        {
            if(!$settings->has('minecraft_mc-offline_count'))
            {
                $settings->put('minecraft_mc-offline_count', 1);
            }
        }
        
    }
}
