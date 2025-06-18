<?php

return [
    'show_warnings' => true,
    'orientation' => 'portrait',
    'defines' => [
        'font_dir' => storage_path('fonts/'),
        'font_cache' => storage_path('fonts/'),
        'temp_dir' => sys_get_temp_dir(),
        'chroot' => realpath(base_path()),
        'allowed_protocols' => [
            'file://' => ['rules' => []],
            'http://' => ['rules' => []],
            'https://' => ['rules' => []],
        ],
        'log_output_file' => null,
        'default_font' => 'DejaVu Sans',
        'default_media_type' => 'screen',
        'default_paper_size' => 'a4',
        'default_font_size' => '12',
        'dpi' => 96,
        'enable_php' => true,
        'enable_javascript' => true,
        'enable_remote' => true,
        'font_height_ratio' => 0.9,
    ],
]; 