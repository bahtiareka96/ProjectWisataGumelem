<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY', 'default_server_key'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'default_client_key'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'sanitized' => env('MIDTRANS_SANITIZED', true),
    '3ds' => env('MIDTRANS_3DS', true),
];

?>
