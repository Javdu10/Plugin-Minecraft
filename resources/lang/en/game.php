<?php

return [
    'minecraft' => [
        'id' => 'UUID',
        'commands' => 'You can use <code>{name}</code> for the player username and <code>{uuid}</code> for the player UUID. The command must not start with <code>/</code>.',
        'mc-ping' => 'Minecraft Ping',
        'mc-rcon' => 'Minecraft RCON',
        'mc-azlink' => 'AzLink',
    ],

    'minecraft_bedrock' => [
        'id' => 'XUID',
        'commands' => 'You can use <code>{name}</code> for the player username and <code>{xuid}</code> for the player XUID. The command must not start with <code>/</code>.',
        'bedrock-ping' => 'Bedrock Ping',
        'bedrock-rcon' => 'Bedrock RCON',
        'mc-azlink' => 'AzLink',
    ],

    'servers' => [
        'status' => [
            'not-azlink' => 'Ce serveur n\'est pas connecté via AzLink.',
            'azlink-connect' => 'La connexion au serveur a échouée, l\'adresse et/ou le port sont incorrects, ou le port est fermé.',
            'azlink-badresponse' => 'La connexion au serveur a échouée (code :code), le token est invalide ou le serveur est mal configuré. Vous pouvez refaire la commande de link pour y remédier.',
        ],

        'ping-no-commands' => 'The ping link doesn\'t need a plugin, but you can\'t execute commands with it.',
        'query-no-commands' => 'With query link, it\'s not possible to execute commands on the server.',

        'query-port-info' => 'Can be empty if it\'s the same as the game port.',

        'fields' => [
            'rcon-password' => 'Rcon Password',
            'rcon-port' => 'Rcon Port',
            'azlink-port' => 'AzLink Port',
        ],

        'azlink' => [
            'link' => 'To link Minecraft to your website using AzLink:',
            'link-1' => '<a href="https://azuriom.com/azlink">Download the plugin AzLink</a> and install it on your server.',
            'link-2' => 'Restart the server.',
            'link-3' => 'Execute this command on the server: ',

            'link-info' => 'You can link your Minecraft server to your website with the command: ',
            'port-info' => 'If you are using a different AzLink port than the default, you must configure it with the command: ',

            'enable-ping' => 'Enable instant commands (require an open port on the server)',
            'ping-info' => 'When instant commands are not enabled, commands will be executed with a delay of 30 seconds to 1 minute.',
            'custom-port' => 'Use a custom AzLink port',
        ],
    ],
];