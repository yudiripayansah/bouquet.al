<?php

fiorello_mikado_get_single_post_format_html($blog_single_type);

do_action('fiorello_mikado_action_after_article_content');

fiorello_mikado_get_module_template_part('templates/parts/single/single-navigation', 'blog');

fiorello_mikado_get_module_template_part('templates/parts/single/author-info', 'blog');

fiorello_mikado_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

fiorello_mikado_get_module_template_part('templates/parts/single/comments', 'blog');