<?php 


namespace Config;

// app/Config/Upload.php

$config = [
    'upload_path'      => WRITEPATH . 'uploads', // Set your desired upload path
    'allowed_types'    => 'jpg|jpeg|png|gif',    // Allowed image file types
    'max_size'         => 2048,                 // Maximum file size in KB
    'max_width'        => 0,
    'max_height'       => 0,
    'overwrite'        => false,
    'encrypt_name'     => true,
    // Other configurations as needed...
];
