<?php

namespace View;

const TEMPLATE_EXTENSION = '.html';
const TEMPLATE_FOLDER = 'template/';
const TEMPLATE_PREFIX = 'blog_post_';

function display($template, $variables = [], $extension = TEMPLATE_EXTENSION)
{
    extract($variables);
    ob_start();
    include TEMPLATE_FOLDER . TEMPLATE_PREFIX . $template . TEMPLATE_EXTENSION;
    return ob_get_clean();
}