<?php

return [
    'production' => false,
    'baseUrl' => 'https://www.moduce.com',
    'site' => [
        'title' => "Moduce's Blog",
        'description' => 'Personal blog of Khoa Vo.',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Khoa Vo',
        'github' => 'moduce',
    ],
    'services' => [
        'analytics' => 'UA-140406785-1',
        'disqus' => 'moduce',
        'cloudinary' => 'moduce',
        'jumprock' => 'moduce',
    ],
    'collections' => [
        'posts' => [
            'path' => 'posts/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
    'excerpt' => function ($page, $limit = 250, $end = '...') {
        return $page->isPost
            ? str_limit_soft(content_sanitize($page->getContent()), $limit, $end)
            : null;
    },
    'imageCdn' => function ($page, $path) {
        return "https://res.cloudinary.com/{$page->services->cloudinary}/{$path}";
    },
];
