<?php

return[  
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'login', 'logout'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:5173'], // harus sama persis (scheme + port)
    'allowed_headers' => ['*'],
    'supports_credentials' => true,
];
