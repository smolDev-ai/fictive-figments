<?php

return  [
    'bold' => [
        'pattern' => '/\[b\](.*?)\[\/b\]/s',
        'replace' => '<strong>$1</strong>',
        'content' => '$1',
    ],

    'italic' => [
        'pattern' => '/\[i\](.*?)\[\/i\]/s',
        'replace' => '<span style="font-style: italic;">$1</span>',
        'content' => '$1',
    ],

    'underline' => [
        'pattern' => '/\[u\](.*?)\[\/u\]/s',
        'replace' => '<u>$1</u>',
        'content' => '$1',
    ],

    'line-through' => [
        'pattern' => '/\[s\](.*?)\[\/s\]/s',
        'replace' => '<span style="text-decoration: line-through;">$1</span>',
        'content' => '$1',
    ],

    'size' => [
        'pattern' => '/\[size\=([1-50])\](.*?)\[\/size\]/s',
        'replace' => '<span style="font-size: $1px;">$2</span>',
        'content' => '$2',
    ],

    'color' => [
        'pattern' => '/\[color\=(#[A-f0-9]{6}|#[A-f0-9]{3})\](.*?)\[\/color\]/s',
        'replace' => '<span style="color: $1;">$2</span>',
        'content' => '$2',
    ],

    'center' => [
        'pattern' => '/\[center\](.*?)\[\/center\]/s',
        'replace' => '<div style="text-align:center;">$1</div>',
        'content' => '$1',
    ],

    'left' => [
        'pattern' => '/\[left\](.*?)\[\/left\]/s',
        'replace' => '<div style="text-align:left;">$1</div>',
        'content' => '$1',
    ],

    'right' => [
        'pattern' => '/\[right\](.*?)\[\/right\]/s',
        'replace' => '<div style="text-align:right;">$1</div>',
        'content' => '$1',
    ],

    'quote' => [
        'pattern' => '/\[quote\](.*?)\[\/quote\]/s',
        'replace' => '<blockquote>$1</blockquote>',
        'content' => '$1',
    ],

    'named-quote' => [
        'pattern' => '/\[quote\=(.*?)\](.*)\[\/quote\]/s',
        'replace' => '<blockquote><small>$1</small>$2</blockquote>',
        'content' => '$2',
    ],

    'link' => [
        'pattern' => '/\[url\](.*?)\[\/url\]/s',
        'replace' => '<a href="$1">$1</a>',
        'content' => '$1',
    ],

    'named-link' => [
        'pattern' => '/\[url\=(.*?)\](.*?)\[\/url\]/s',
        'replace' => '<a href="$1">$2</a>',
        'content' => '$2',
    ],

    'image' => [
        'pattern' => '/\[img\](.*?)\[\/img\]/s',
        'replace' => '<img src="$1">',
        'content' => '$1',
    ],

    'ordered-list-numerical' => [
        'pattern' => '/\[list=1\](.*?)\[\/list\]/s',
        'replace' => '<ol>$1</ol>',
        'content' => '$1',
    ],

    'ordered-list-alpha' => [
        'pattern' => '/\[list=a\](.*?)\[\/list\]/s',
        'replace' => '<ol type="a">$1</ol>',
        'content' => '$1',
    ],

    'unordered-list' => [
        'pattern' => '/\[list\](.*?)\[\/list\]/s',
        'replace' => '<ul>$1</ul>',
        'content' => '$1',
    ],

    'list-item' => [
        'pattern' => '/\[\*\](.*)/',
        'replace' => '<li>$1</li>',
        'content' => '$1',
    ],

    'code' => [
        'pattern' => '/\[code\](.*?)\[\/code\]/s',
        'replace' => '<code>$1</code>',
        'content' => '$1',
    ],

    'youtube' => [
        'pattern' => '/\[youtube\](.*?)\[\/youtube\]/s',
        'replace' => '<iframe width="560" height="315" src="//www.youtube.com/embed/$1" allowfullscreen></iframe>',
        'content' => '$1',
    ],

    'linebreak' => [
        'pattern' => '/\r\n/',
        'replace' => '<br />',
        'content' => '',
    ],

    'sup' => [
        'pattern' => '/\[sup\](.*?)\[\/sup\]/s',
        'replace' => "<sup>$1</sup>",
        'content' => '$1'
    ],

    'sub' => [
        'pattern' => '/\[sub\](.*?)\[\/sub\]/s',
        'replace' => "<sub>$1</sub>",
        'content' => '$1'
    ],
    'h1' => [
        'pattern' => '/\[h1\](.*?)\[\/h1\]/s',
        'replace' => "<h1>$1</h1>",
        'content' => '$1'
    ],
    'h2' => [
        'pattern' => '/\[h2\](.*?)\[\/h2\]/s',
        'replace' => "<h2>$1</h2>",
        'content' => '$1'
    ],
    'h3' => [
        'pattern' => '/\[h3\](.*?)\[\/h3\]/s',
        'replace' => "<h3>$1</h3>",
        'content' => '$1'
    ],
    'h4' => [
        'pattern' => '/\[h4\](.*?)\[\/h4\]/s',
        'replace' => "<h4>$1</h4>",
        'content' => '$1'
    ],
    'h5' => [
        'pattern' => '/\[h5\](.*?)\[\/h5\]/s',
        'replace' => "<h5>$1</h5>",
        'content' => '$1'
    ],
    'h6' => [
        'pattern' => '/\[h6\](.*?)\[\/h6\]/s',
        'replace' => "<h6>$1</h6>",
        'content' => '$1'
    ],
    'bgcolor' => [
        'pattern' => '/\[bgcolor\=(#[A-f0-9]{6}|#[A-f0-9]{3})\](.*?)\[\/bgcolor\]/s',
        'replace' => '<span style="background-color: $1;">$2</span>',
        'content' => '$2',
    ]


];
