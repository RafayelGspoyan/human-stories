<?php

return array(
    'news/page-([0-9]+)'            => 'news/index/$1',
    'news'                          => 'news/index',
    'news/([0-9]+)'                 => 'news/view/$1',
    'user/login'                    => 'user/login',
    'user/logout'                   => 'user/logout',
    'admin/news/create'             => 'adminNews/create',
    'admin/news/category'           => 'adminNews/category',
    'admin/news/update/([0-9]+)'    => 'adminNews/update/$1',
    'admin/news/delete/([0-9]+)'    => 'adminNews/delete/$1',
    'admin/news'                    => 'adminNews/index',
    'admin'                         => 'admin/index',
    ''                              => 'home/index'
);
