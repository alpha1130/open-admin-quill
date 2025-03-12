<?php

return [
    'quill' => [
        'modules' => [
            'toolbar' => [
                ['size' => []],
                ['header' => []],
                'bold',
                'italic',
                'underline',
                'strike',
                ['script' => 'super'],
                ['script' => 'sub'],
                ['color' => []],
                ['background' => []],
                'blockquote',
                'code-block',
                ['list' => 'ordered'],
                ['list' => 'bullet'],
                ['indent' => '-1'],
                ['indent' => '+1'],
                'direction',
                ['align' => []],
                'link',
                'image',
                // 'video',
                // 'formula',
                'clean',
            ]
        ],

        'theme' => 'snow',
    ],
    'qcs' => [
        'appid' => '',
        'secret_id' => '',
        'secret_key' => '',
        'bucket' => '',
        'region' => '',
        'url' => '',
        'key_prefix' => '',
    ]
];
