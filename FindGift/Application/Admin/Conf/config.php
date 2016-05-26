<?php

return array(
    
    //'DEFAULT_CONTROLLER' => 'Main', // 默认控制器名称
    //  'DEFAULT_ACTION' => 'Index', // 默认操作名称
    'PICTURE_UPLOAD_DRIVER'=>'local',
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__IMG__' => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        '__Fonts__' => __ROOT__ . '/Public/' . MODULE_NAME . '/fonts',
        '__UEDITOR__' => __ROOT__ . '/Public/utf8-php',
    ),
        'VAR_SESSION_ID' => 'session_id',	//修复uploadify插件无法传递session_id的bug
);
