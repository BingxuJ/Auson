<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {

    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'tyros'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {

    // Test data
    $test_array = array(
        'one' => __('One', 'tyros'),
        'two' => __('Two', 'tyros'),
        'three' => __('Three', 'tyros'),
        'four' => __('Four', 'tyros'),
        'five' => __('Five', 'tyros')
    );
    $footer_columns = array(
        'col-md-12' => __('One', 'tyros'),
        'col-md-6' => __('Two', 'tyros'),
        'col-md-4' => __('Three', 'tyros'),
        'col-md-3' => __('Four', 'tyros'),
    );
    $icon_array = array(
        'fa fa-automobile' => __('automobile', 'tyros'), 'fa fa-bank' => __('bank', 'tyros'), 'fa fa-behance' => __('behance', 'tyros'), 'fa fa-behance-square' => __('behance-square', 'tyros'), 'fa fa-bomb' => __('bomb', 'tyros'), 'fa fa-building' => __('building', 'tyros'), 'fa fa-cab' => __('cab', 'tyros'), 'fa fa-car' => __('car', 'tyros'), 'fa fa-child' => __('child', 'tyros'), 'fa fa-circle-o-notch' => __('circle-o-notch', 'tyros'), 'fa fa-circle-thin' => __('circle-thin', 'tyros'), 'fa fa-codepen' => __('codepen', 'tyros'), 'fa fa-cube' => __('cube', 'tyros'), 'fa fa-cubes' => __('cubes', 'tyros'), 'fa fa-database' => __('database', 'tyros'), 'fa fa-delicious' => __('delicious', 'tyros'), 'fa fa-deviantart' => __('deviantart', 'tyros'), 'fa fa-digg' => __('digg', 'tyros'), 'fa fa-drupal' => __('drupal', 'tyros'), 'fa fa-empire' => __('empire', 'tyros'), 'fa fa-envelope-square' => __('envelope-square', 'tyros'), 'fa fa-fax' => __('fax', 'tyros'), 'fa fa-file-archive-o' => __('file-archive-o', 'tyros'), 'fa fa-file-audio-o' => __('file-audio-o', 'tyros'), 'fa fa-file-code-o' => __('file-code-o', 'tyros'), 'fa fa-file-excel-o' => __('file-excel-o', 'tyros'), 'fa fa-file-image-o' => __('file-image-o', 'tyros'), 'fa fa-file-movie-o' => __('file-movie-o', 'tyros'), 'fa fa-file-pdf-o' => __('file-pdf-o', 'tyros'), 'fa fa-file-photo-o' => __('file-photo-o', 'tyros'), 'fa fa-file-picture-o' => __('file-picture-o', 'tyros'), 'fa fa-file-powerpoint-o' => __('file-powerpoint-o', 'tyros'), 'fa fa-file-sound-o' => __('file-sound-o', 'tyros'), 'fa fa-file-video-o' => __('file-video-o', 'tyros'), 'fa fa-file-word-o' => __('file-word-o', 'tyros'), 'fa fa-file-zip-o' => __('file-zip-o', 'tyros'), 'fa fa-ge' => __('ge', 'tyros'), 'fa fa-git' => __('git', 'tyros'), 'fa fa-git-square' => __('git-square', 'tyros'), 'fa fa-google' => __('google', 'tyros'), 'fa fa-graduation-cap' => __('graduation-cap', 'tyros'), 'fa fa-hacker-news' => __('hacker-news', 'tyros'), 'fa fa-header' => __('header', 'tyros'), 'fa fa-history' => __('history', 'tyros'), 'fa fa-institution' => __('institution', 'tyros'), 'fa fa-joomla' => __('joomla', 'tyros'), 'fa fa-jsfiddle' => __('jsfiddle', 'tyros'), 'fa fa-language' => __('language', 'tyros'), 'fa fa-life-bouy' => __('life-bouy', 'tyros'), 'fa fa-life-ring' => __('life-ring', 'tyros'), 'fa fa-life-saver' => __('life-saver', 'tyros'), 'fa fa-mortar-board' => __('mortar-board', 'tyros'), 'fa fa-openid' => __('openid', 'tyros'), 'fa fa-paper-plane' => __('paper-plane', 'tyros'), 'fa fa-paper-plane-o' => __('paper-plane-o', 'tyros'), 'fa fa-paragraph' => __('paragraph', 'tyros'), 'fa fa-paw' => __('paw', 'tyros'), 'fa fa-pied-piper' => __('pied-piper', 'tyros'), 'fa fa-pied-piper-alt' => __('pied-piper-alt', 'tyros'), 'fa fa-pied-piper-square' => __('pied-piper-square', 'tyros'), 'fa fa-qq' => __('qq', 'tyros'), 'fa fa-ra' => __('ra', 'tyros'), 'fa fa-rebel' => __('rebel', 'tyros'), 'fa fa-recycle' => __('recycle', 'tyros'), 'fa fa-reddit' => __('reddit', 'tyros'), 'fa fa-reddit-square' => __('reddit-square', 'tyros'), 'fa fa-send' => __('send', 'tyros'), 'fa fa-send-o' => __('send-o', 'tyros'), 'fa fa-share-alt' => __('share-alt', 'tyros'), 'fa fa-share-alt-square' => __('share-alt-square', 'tyros'), 'fa fa-slack' => __('slack', 'tyros'), 'fa fa-sliders' => __('sliders', 'tyros'), 'fa fa-soundcloud' => __('soundcloud', 'tyros'), 'fa fa-space-shuttle' => __('space-shuttle', 'tyros'), 'fa fa-spoon' => __('spoon', 'tyros'), 'fa fa-spotify' => __('spotify', 'tyros'), 'fa fa-steam' => __('steam', 'tyros'), 'fa fa-steam-square' => __('steam-square', 'tyros'), 'fa fa-stumbleupon' => __('stumbleupon', 'tyros'), 'fa fa-stumbleupon-circle' => __('stumbleupon-circle', 'tyros'), 'fa fa-support' => __('support', 'tyros'), 'fa fa-taxi' => __('taxi', 'tyros'), 'fa fa-tencent-weibo' => __('tencent-weibo', 'tyros'), 'fa fa-tree' => __('tree', 'tyros'), 'fa fa-university' => __('university', 'tyros'), 'fa fa-vine' => __('vine', 'tyros'), 'fa fa-wechat' => __('wechat', 'tyros'), 'fa fa-weixin' => __('weixin', 'tyros'), 'fa fa-wordpress' => __('wordpress', 'tyros'), 'fa fa-yahoo' => __('yahoo', 'tyros'), 'fa fa-adjust' => __('adjust', 'tyros'), 'fa fa-anchor' => __('anchor', 'tyros'), 'fa fa-archive' => __('archive', 'tyros'), 'fa fa-arrows' => __('arrows', 'tyros'), 'fa fa-arrows-h' => __('arrows-h', 'tyros'), 'fa fa-arrows-v' => __('arrows-v', 'tyros'), 'fa fa-asterisk' => __('asterisk', 'tyros'), 'fa fa-automobile' => __('automobile', 'tyros'), 'fa fa-ban' => __('ban', 'tyros'), 'fa fa-bank' => __('bank', 'tyros'), 'fa fa-bar-chart-o' => __('bar-chart-o', 'tyros'), 'fa fa-barcode' => __('barcode', 'tyros'), 'fa fa-bars' => __('bars', 'tyros'), 'fa fa-beer' => __('beer', 'tyros'), 'fa fa-bell' => __('bell', 'tyros'), 'fa fa-bell-o' => __('bell-o', 'tyros'), 'fa fa-bolt' => __('bolt', 'tyros'), 'fa fa-bomb' => __('bomb', 'tyros'), 'fa fa-book' => __('book', 'tyros'), 'fa fa-bookmark' => __('bookmark', 'tyros'), 'fa fa-bookmark-o' => __('bookmark-o', 'tyros'), 'fa fa-briefcase' => __('briefcase', 'tyros'), 'fa fa-bug' => __('bug', 'tyros'), 'fa fa-building' => __('building', 'tyros'), 'fa fa-building-o' => __('building-o', 'tyros'), 'fa fa-bullhorn' => __('bullhorn', 'tyros'), 'fa fa-bullseye' => __('bullseye', 'tyros'), 'fa fa-cab' => __('cab', 'tyros'), 'fa fa-calendar' => __('calendar', 'tyros'), 'fa fa-calendar-o' => __('calendar-o', 'tyros'), 'fa fa-camera' => __('camera', 'tyros'), 'fa fa-camera-retro' => __('camera-retro', 'tyros'), 'fa fa-car' => __('car', 'tyros'), 'fa fa-caret-square-o-down' => __('caret-square-o-down', 'tyros'), 'fa fa-caret-square-o-left' => __('caret-square-o-left', 'tyros'), 'fa fa-caret-square-o-right' => __('caret-square-o-right', 'tyros'), 'fa fa-caret-square-o-up' => __('caret-square-o-up', 'tyros'), 'fa fa-certificate' => __('certificate', 'tyros'), 'fa fa-check' => __('check', 'tyros'), 'fa fa-check-circle' => __('check-circle', 'tyros'), 'fa fa-check-circle-o' => __('check-circle-o', 'tyros'), 'fa fa-check-square' => __('check-square', 'tyros'), 'fa fa-check-square-o' => __('check-square-o', 'tyros'), 'fa fa-child' => __('child', 'tyros'), 'fa fa-circle' => __('circle', 'tyros'), 'fa fa-circle-o' => __('circle-o', 'tyros'), 'fa fa-circle-o-notch' => __('circle-o-notch', 'tyros'), 'fa fa-circle-thin' => __('circle-thin', 'tyros'), 'fa fa-clock-o' => __('clock-o', 'tyros'), 'fa fa-cloud' => __('cloud', 'tyros'), 'fa fa-cloud-download' => __('cloud-download', 'tyros'), 'fa fa-cloud-upload' => __('cloud-upload', 'tyros'), 'fa fa-code' => __('code', 'tyros'), 'fa fa-code-fork' => __('code-fork', 'tyros'), 'fa fa-coffee' => __('coffee', 'tyros'), 'fa fa-cog' => __('cog', 'tyros'), 'fa fa-cogs' => __('cogs', 'tyros'), 'fa fa-comment' => __('comment', 'tyros'), 'fa fa-comment-o' => __('comment-o', 'tyros'), 'fa fa-comments' => __('comments', 'tyros'), 'fa fa-comments-o' => __('comments-o', 'tyros'), 'fa fa-compass' => __('compass', 'tyros'), 'fa fa-credit-card' => __('credit-card', 'tyros'), 'fa fa-crop' => __('crop', 'tyros'), 'fa fa-crosshairs' => __('crosshairs', 'tyros'), 'fa fa-cube' => __('cube', 'tyros'), 'fa fa-cubes' => __('cubes', 'tyros'), 'fa fa-cutlery' => __('cutlery', 'tyros'), 'fa fa-dashboard' => __('dashboard', 'tyros'), 'fa fa-database' => __('database', 'tyros'), 'fa fa-desktop' => __('desktop', 'tyros'), 'fa fa-dot-circle-o' => __('dot-circle-o', 'tyros'), 'fa fa-download' => __('download', 'tyros'), 'fa fa-edit' => __('edit', 'tyros'), 'fa fa-ellipsis-h' => __('ellipsis-h', 'tyros'), 'fa fa-ellipsis-v' => __('ellipsis-v', 'tyros'), 'fa fa-envelope' => __('envelope', 'tyros'), 'fa fa-envelope-o' => __('envelope-o', 'tyros'), 'fa fa-envelope-square' => __('envelope-square', 'tyros'), 'fa fa-eraser' => __('eraser', 'tyros'), 'fa fa-exchange' => __('exchange', 'tyros'), 'fa fa-exclamation' => __('exclamation', 'tyros'), 'fa fa-exclamation-circle' => __('exclamation-circle', 'tyros'), 'fa fa-exclamation-triangle' => __('exclamation-triangle', 'tyros'), 'fa fa-external-link' => __('external-link', 'tyros'), 'fa fa-external-link-square' => __('external-link-square', 'tyros'), 'fa fa-eye' => __('eye', 'tyros'), 'fa fa-eye-slash' => __('eye-slash', 'tyros'), 'fa fa-fax' => __('fax', 'tyros'), 'fa fa-female' => __('female', 'tyros'), 'fa fa-fighter-jet' => __('fighter-jet', 'tyros'), 'fa fa-file-archive-o' => __('file-archive-o', 'tyros'), 'fa fa-file-audio-o' => __('file-audio-o', 'tyros'), 'fa fa-file-code-o' => __('file-code-o', 'tyros'), 'fa fa-file-excel-o' => __('file-excel-o', 'tyros'), 'fa fa-file-image-o' => __('file-image-o', 'tyros'), 'fa fa-file-movie-o' => __('file-movie-o', 'tyros'), 'fa fa-file-pdf-o' => __('file-pdf-o', 'tyros'), 'fa fa-file-photo-o' => __('file-photo-o', 'tyros'), 'fa fa-file-picture-o' => __('file-picture-o', 'tyros'), 'fa fa-file-powerpoint-o' => __('file-powerpoint-o', 'tyros'), 'fa fa-file-sound-o' => __('file-sound-o', 'tyros'), 'fa fa-file-video-o' => __('file-video-o', 'tyros'), 'fa fa-file-word-o' => __('file-word-o', 'tyros'), 'fa fa-file-zip-o' => __('file-zip-o', 'tyros'), 'fa fa-film' => __('film', 'tyros'), 'fa fa-filter' => __('filter', 'tyros'), 'fa fa-fire' => __('fire', 'tyros'), 'fa fa-fire-extinguisher' => __('fire-extinguisher', 'tyros'), 'fa fa-flag' => __('flag', 'tyros'), 'fa fa-flag-checkered' => __('flag-checkered', 'tyros'), 'fa fa-flag-o' => __('flag-o', 'tyros'), 'fa fa-flash' => __('flash', 'tyros'), 'fa fa-flask' => __('flask', 'tyros'), 'fa fa-folder' => __('folder', 'tyros'), 'fa fa-folder-o' => __('folder-o', 'tyros'), 'fa fa-folder-open' => __('folder-open', 'tyros'), 'fa fa-folder-open-o' => __('folder-open-o', 'tyros'), 'fa fa-frown-o' => __('frown-o', 'tyros'), 'fa fa-gamepad' => __('gamepad', 'tyros'), 'fa fa-gavel' => __('gavel', 'tyros'), 'fa fa-gear' => __('gear', 'tyros'), 'fa fa-gears' => __('gears', 'tyros'), 'fa fa-gift' => __('gift', 'tyros'), 'fa fa-glass' => __('glass', 'tyros'), 'fa fa-globe' => __('globe', 'tyros'), 'fa fa-graduation-cap' => __('graduation-cap', 'tyros'), 'fa fa-group' => __('group', 'tyros'), 'fa fa-hdd-o' => __('hdd-o', 'tyros'), 'fa fa-headphones' => __('headphones', 'tyros'), 'fa fa-heart' => __('heart', 'tyros'), 'fa fa-heart-o' => __('heart-o', 'tyros'), 'fa fa-history' => __('history', 'tyros'), 'fa fa-home' => __('home', 'tyros'), 'fa fa-image' => __('image', 'tyros'), 'fa fa-inbox' => __('inbox', 'tyros'), 'fa fa-info' => __('info', 'tyros'), 'fa fa-info-circle' => __('info-circle', 'tyros'), 'fa fa-institution' => __('institution', 'tyros'), 'fa fa-key' => __('key', 'tyros'), 'fa fa-keyboard-o' => __('keyboard-o', 'tyros'), 'fa fa-language' => __('language', 'tyros'), 'fa fa-laptop' => __('laptop', 'tyros'), 'fa fa-leaf' => __('leaf', 'tyros'), 'fa fa-legal' => __('legal', 'tyros'), 'fa fa-lemon-o' => __('lemon-o', 'tyros'), 'fa fa-level-down' => __('level-down', 'tyros'), 'fa fa-level-up' => __('level-up', 'tyros'), 'fa fa-life-bouy' => __('life-bouy', 'tyros'), 'fa fa-life-ring' => __('life-ring', 'tyros'), 'fa fa-life-saver' => __('life-saver', 'tyros'), 'fa fa-lightbulb-o' => __('lightbulb-o', 'tyros'), 'fa fa-location-arrow' => __('location-arrow', 'tyros'), 'fa fa-lock' => __('lock', 'tyros'), 'fa fa-magic' => __('magic', 'tyros'), 'fa fa-magnet' => __('magnet', 'tyros'), 'fa fa-mail-forward' => __('mail-forward', 'tyros'), 'fa fa-mail-reply' => __('mail-reply', 'tyros'), 'fa fa-mail-reply-all' => __('mail-reply-all', 'tyros'), 'fa fa-male' => __('male', 'tyros'), 'fa fa-map-marker' => __('map-marker', 'tyros'), 'fa fa-meh-o' => __('meh-o', 'tyros'), 'fa fa-microphone' => __('microphone', 'tyros'), 'fa fa-microphone-slash' => __('microphone-slash', 'tyros'), 'fa fa-minus' => __('minus', 'tyros'), 'fa fa-minus-circle' => __('minus-circle', 'tyros'), 'fa fa-minus-square' => __('minus-square', 'tyros'), 'fa fa-minus-square-o' => __('minus-square-o', 'tyros'), 'fa fa-mobile' => __('mobile', 'tyros'), 'fa fa-mobile-phone' => __('mobile-phone', 'tyros'), 'fa fa-money' => __('money', 'tyros'), 'fa fa-moon-o' => __('moon-o', 'tyros'), 'fa fa-mortar-board' => __('mortar-board', 'tyros'), 'fa fa-music' => __('music', 'tyros'), 'fa fa-navicon' => __('navicon', 'tyros'), 'fa fa-paper-plane' => __('paper-plane', 'tyros'), 'fa fa-paper-plane-o' => __('paper-plane-o', 'tyros'), 'fa fa-paw' => __('paw', 'tyros'), 'fa fa-pencil' => __('pencil', 'tyros'), 'fa fa-pencil-square' => __('pencil-square', 'tyros'), 'fa fa-pencil-square-o' => __('pencil-square-o', 'tyros'), 'fa fa-phone' => __('phone', 'tyros'), 'fa fa-phone-square' => __('phone-square', 'tyros'), 'fa fa-photo' => __('photo', 'tyros'), 'fa fa-picture-o' => __('picture-o', 'tyros'), 'fa fa-plane' => __('plane', 'tyros'), 'fa fa-plus' => __('plus', 'tyros'), 'fa fa-plus-circle' => __('plus-circle', 'tyros'), 'fa fa-plus-square' => __('plus-square', 'tyros'), 'fa fa-plus-square-o' => __('plus-square-o', 'tyros'), 'fa fa-power-off' => __('power-off', 'tyros'), 'fa fa-print' => __('print', 'tyros'), 'fa fa-puzzle-piece' => __('puzzle-piece', 'tyros'), 'fa fa-qrcode' => __('qrcode', 'tyros'), 'fa fa-question' => __('question', 'tyros'), 'fa fa-question-circle' => __('question-circle', 'tyros'), 'fa fa-quote-left' => __('quote-left', 'tyros'), 'fa fa-quote-right' => __('quote-right', 'tyros'), 'fa fa-random' => __('random', 'tyros'), 'fa fa-recycle' => __('recycle', 'tyros'), 'fa fa-refresh' => __('refresh', 'tyros'), 'fa fa-reorder' => __('reorder', 'tyros'), 'fa fa-reply' => __('reply', 'tyros'), 'fa fa-reply-all' => __('reply-all', 'tyros'), 'fa fa-retweet' => __('retweet', 'tyros'), 'fa fa-road' => __('road', 'tyros'), 'fa fa-rocket' => __('rocket', 'tyros'), 'fa fa-rss' => __('rss', 'tyros'), 'fa fa-rss-square' => __('rss-square', 'tyros'), 'fa fa-search' => __('search', 'tyros'), 'fa fa-search-minus' => __('search-minus', 'tyros'), 'fa fa-search-plus' => __('search-plus', 'tyros'), 'fa fa-send' => __('send', 'tyros'), 'fa fa-send-o' => __('send-o', 'tyros'), 'fa fa-share' => __('share', 'tyros'), 'fa fa-share-alt' => __('share-alt', 'tyros'), 'fa fa-share-alt-square' => __('share-alt-square', 'tyros'), 'fa fa-share-square' => __('share-square', 'tyros'), 'fa fa-share-square-o' => __('share-square-o', 'tyros'), 'fa fa-shield' => __('shield', 'tyros'), 'fa fa-shopping-cart' => __('shopping-cart', 'tyros'), 'fa fa-sign-in' => __('sign-in', 'tyros'), 'fa fa-sign-out' => __('sign-out', 'tyros'), 'fa fa-signal' => __('signal', 'tyros'), 'fa fa-sitemap' => __('sitemap', 'tyros'), 'fa fa-sliders' => __('sliders', 'tyros'), 'fa fa-smile-o' => __('smile-o', 'tyros'), 'fa fa-sort' => __('sort', 'tyros'), 'fa fa-sort-alpha-asc' => __('sort-alpha-asc', 'tyros'), 'fa fa-sort-alpha-desc' => __('sort-alpha-desc', 'tyros'), 'fa fa-sort-amount-asc' => __('sort-amount-asc', 'tyros'), 'fa fa-sort-amount-desc' => __('sort-amount-desc', 'tyros'), 'fa fa-sort-asc' => __('sort-asc', 'tyros'), 'fa fa-sort-desc' => __('sort-desc', 'tyros'), 'fa fa-sort-down' => __('sort-down', 'tyros'), 'fa fa-sort-numeric-asc' => __('sort-numeric-asc', 'tyros'), 'fa fa-sort-numeric-desc' => __('sort-numeric-desc', 'tyros'), 'fa fa-sort-up' => __('sort-up', 'tyros'), 'fa fa-space-shuttle' => __('space-shuttle', 'tyros'), 'fa fa-spinner' => __('spinner', 'tyros'), 'fa fa-spoon' => __('spoon', 'tyros'), 'fa fa-square' => __('square', 'tyros'), 'fa fa-square-o' => __('square-o', 'tyros'), 'fa fa-star' => __('star', 'tyros'), 'fa fa-star-half' => __('star-half', 'tyros'), 'fa fa-star-half-empty' => __('star-half-empty', 'tyros'), 'fa fa-star-half-full' => __('star-half-full', 'tyros'), 'fa fa-star-half-o' => __('star-half-o', 'tyros'), 'fa fa-star-o' => __('star-o', 'tyros'), 'fa fa-suitcase' => __('suitcase', 'tyros'), 'fa fa-sun-o' => __('sun-o', 'tyros'), 'fa fa-support' => __('support', 'tyros'), 'fa fa-tablet' => __('tablet', 'tyros'), 'fa fa-tachometer' => __('tachometer', 'tyros'), 'fa fa-tag' => __('tag', 'tyros'), 'fa fa-tags' => __('tags', 'tyros'), 'fa fa-tasks' => __('tasks', 'tyros'), 'fa fa-taxi' => __('taxi', 'tyros'), 'fa fa-terminal' => __('terminal', 'tyros'), 'fa fa-thumb-tack' => __('thumb-tack', 'tyros'), 'fa fa-thumbs-down' => __('thumbs-down', 'tyros'), 'fa fa-thumbs-o-down' => __('thumbs-o-down', 'tyros'), 'fa fa-thumbs-o-up' => __('thumbs-o-up', 'tyros'), 'fa fa-thumbs-up' => __('thumbs-up', 'tyros'), 'fa fa-ticket' => __('ticket', 'tyros'), 'fa fa-times' => __('times', 'tyros'), 'fa fa-times-circle' => __('times-circle', 'tyros'), 'fa fa-times-circle-o' => __('times-circle-o', 'tyros'), 'fa fa-tint' => __('tint', 'tyros'), 'fa fa-toggle-down' => __('toggle-down', 'tyros'), 'fa fa-toggle-left' => __('toggle-left', 'tyros'), 'fa fa-toggle-right' => __('toggle-right', 'tyros'), 'fa fa-toggle-up' => __('toggle-up', 'tyros'), 'fa fa-trash-o' => __('trash-o', 'tyros'), 'fa fa-tree' => __('tree', 'tyros'), 'fa fa-trophy' => __('trophy', 'tyros'), 'fa fa-truck' => __('truck', 'tyros'), 'fa fa-umbrella' => __('umbrella', 'tyros'), 'fa fa-university' => __('university', 'tyros'), 'fa fa-unlock' => __('unlock', 'tyros'), 'fa fa-unlock-alt' => __('unlock-alt', 'tyros'), 'fa fa-unsorted' => __('unsorted', 'tyros'), 'fa fa-upload' => __('upload', 'tyros'), 'fa fa-user' => __('user', 'tyros'), 'fa fa-users' => __('users', 'tyros'), 'fa fa-video-camera' => __('video-camera', 'tyros'), 'fa fa-volume-down' => __('volume-down', 'tyros'), 'fa fa-volume-off' => __('volume-off', 'tyros'), 'fa fa-volume-up' => __('volume-up', 'tyros'), 'fa fa-warning' => __('warning', 'tyros'), 'fa fa-wheelchair' => __('wheelchair', 'tyros'), 'fa fa-wrench' => __('wrench', 'tyros'), 'fa fa-file' => __('file', 'tyros'), 'fa fa-file-archive-o' => __('file-archive-o', 'tyros'), 'fa fa-file-audio-o' => __('file-audio-o', 'tyros'), 'fa fa-file-code-o' => __('file-code-o', 'tyros'), 'fa fa-file-excel-o' => __('file-excel-o', 'tyros'), 'fa fa-file-image-o' => __('file-image-o', 'tyros'), 'fa fa-file-movie-o' => __('file-movie-o', 'tyros'), 'fa fa-file-o' => __('file-o', 'tyros'), 'fa fa-file-pdf-o' => __('file-pdf-o', 'tyros'), 'fa fa-file-photo-o' => __('file-photo-o', 'tyros'), 'fa fa-file-picture-o' => __('file-picture-o', 'tyros'), 'fa fa-file-powerpoint-o' => __('file-powerpoint-o', 'tyros'), 'fa fa-file-sound-o' => __('file-sound-o', 'tyros'), 'fa fa-file-text' => __('file-text', 'tyros'), 'fa fa-file-text-o' => __('file-text-o', 'tyros'), 'fa fa-file-video-o' => __('file-video-o', 'tyros'), 'fa fa-file-word-o' => __('file-word-o', 'tyros'), 'fa fa-file-zip-o' => __('file-zip-o', 'tyros'), 'fa fa-info-circle fa-lg fa-li' => __('info-circle fa-lg fa-li', 'tyros'), 'fa fa-circle-o-notch' => __('circle-o-notch', 'tyros'), 'fa fa-cog' => __('cog', 'tyros'), 'fa fa-gear' => __('gear', 'tyros'), 'fa fa-refresh' => __('refresh', 'tyros'), 'fa fa-spinner' => __('spinner', 'tyros'), 'fa fa-check-square' => __('check-square', 'tyros'), 'fa fa-check-square-o' => __('check-square-o', 'tyros'), 'fa fa-circle' => __('circle', 'tyros'), 'fa fa-circle-o' => __('circle-o', 'tyros'), 'fa fa-dot-circle-o' => __('dot-circle-o', 'tyros'), 'fa fa-minus-square' => __('minus-square', 'tyros'), 'fa fa-minus-square-o' => __('minus-square-o', 'tyros'), 'fa fa-plus-square' => __('plus-square', 'tyros'), 'fa fa-plus-square-o' => __('plus-square-o', 'tyros'), 'fa fa-square' => __('square', 'tyros'), 'fa fa-square-o' => __('square-o', 'tyros'), 'fa fa-bitcoin' => __('bitcoin', 'tyros'), 'fa fa-btc' => __('btc', 'tyros'), 'fa fa-cny' => __('cny', 'tyros'), 'fa fa-dollar' => __('dollar', 'tyros'), 'fa fa-eur' => __('eur', 'tyros'), 'fa fa-euro' => __('euro', 'tyros'), 'fa fa-gbp' => __('gbp', 'tyros'), 'fa fa-inr' => __('inr', 'tyros'), 'fa fa-jpy' => __('jpy', 'tyros'), 'fa fa-krw' => __('krw', 'tyros'), 'fa fa-money' => __('money', 'tyros'), 'fa fa-rmb' => __('rmb', 'tyros'), 'fa fa-rouble' => __('rouble', 'tyros'), 'fa fa-rub' => __('rub', 'tyros'), 'fa fa-ruble' => __('ruble', 'tyros'), 'fa fa-rupee' => __('rupee', 'tyros'), 'fa fa-try' => __('try', 'tyros'), 'fa fa-turkish-lira' => __('turkish-lira', 'tyros'), 'fa fa-usd' => __('usd', 'tyros'), 'fa fa-won' => __('won', 'tyros'), 'fa fa-yen' => __('yen', 'tyros'), 'fa fa-align-center' => __('align-center', 'tyros'), 'fa fa-align-justify' => __('align-justify', 'tyros'), 'fa fa-align-left' => __('align-left', 'tyros'), 'fa fa-align-right' => __('align-right', 'tyros'), 'fa fa-bold' => __('bold', 'tyros'), 'fa fa-chain' => __('chain', 'tyros'), 'fa fa-chain-broken' => __('chain-broken', 'tyros'), 'fa fa-clipboard' => __('clipboard', 'tyros'), 'fa fa-columns' => __('columns', 'tyros'), 'fa fa-copy' => __('copy', 'tyros'), 'fa fa-cut' => __('cut', 'tyros'), 'fa fa-dedent' => __('dedent', 'tyros'), 'fa fa-eraser' => __('eraser', 'tyros'), 'fa fa-file' => __('file', 'tyros'), 'fa fa-file-o' => __('file-o', 'tyros'), 'fa fa-file-text' => __('file-text', 'tyros'), 'fa fa-file-text-o' => __('file-text-o', 'tyros'), 'fa fa-files-o' => __('files-o', 'tyros'), 'fa fa-floppy-o' => __('floppy-o', 'tyros'), 'fa fa-font' => __('font', 'tyros'), 'fa fa-header' => __('header', 'tyros'), 'fa fa-indent' => __('indent', 'tyros'), 'fa fa-italic' => __('italic', 'tyros'), 'fa fa-link' => __('link', 'tyros'), 'fa fa-list' => __('list', 'tyros'), 'fa fa-list-alt' => __('list-alt', 'tyros'), 'fa fa-list-ol' => __('list-ol', 'tyros'), 'fa fa-list-ul' => __('list-ul', 'tyros'), 'fa fa-outdent' => __('outdent', 'tyros'), 'fa fa-paperclip' => __('paperclip', 'tyros'), 'fa fa-paragraph' => __('paragraph', 'tyros'), 'fa fa-paste' => __('paste', 'tyros'), 'fa fa-repeat' => __('repeat', 'tyros'), 'fa fa-rotate-left' => __('rotate-left', 'tyros'), 'fa fa-rotate-right' => __('rotate-right', 'tyros'), 'fa fa-save' => __('save', 'tyros'), 'fa fa-scissors' => __('scissors', 'tyros'), 'fa fa-strikethrough' => __('strikethrough', 'tyros'), 'fa fa-subscript' => __('subscript', 'tyros'), 'fa fa-superscript' => __('superscript', 'tyros'), 'fa fa-table' => __('table', 'tyros'), 'fa fa-text-height' => __('text-height', 'tyros'), 'fa fa-text-width' => __('text-width', 'tyros'), 'fa fa-th' => __('th', 'tyros'), 'fa fa-th-large' => __('th-large', 'tyros'), 'fa fa-th-list' => __('th-list', 'tyros'), 'fa fa-underline' => __('underline', 'tyros'), 'fa fa-undo' => __('undo', 'tyros'), 'fa fa-unlink' => __('unlink', 'tyros'), 'fa fa-angle-double-down' => __('angle-double-down', 'tyros'), 'fa fa-angle-double-left' => __('angle-double-left', 'tyros'), 'fa fa-angle-double-right' => __('angle-double-right', 'tyros'), 'fa fa-angle-double-up' => __('angle-double-up', 'tyros'), 'fa fa-angle-down' => __('angle-down', 'tyros'), 'fa fa-angle-left' => __('angle-left', 'tyros'), 'fa fa-angle-right' => __('angle-right', 'tyros'), 'fa fa-angle-up' => __('angle-up', 'tyros'), 'fa fa-arrow-circle-down' => __('arrow-circle-down', 'tyros'), 'fa fa-arrow-circle-left' => __('arrow-circle-left', 'tyros'), 'fa fa-arrow-circle-o-down' => __('arrow-circle-o-down', 'tyros'), 'fa fa-arrow-circle-o-left' => __('arrow-circle-o-left', 'tyros'), 'fa fa-arrow-circle-o-right' => __('arrow-circle-o-right', 'tyros'), 'fa fa-arrow-circle-o-up' => __('arrow-circle-o-up', 'tyros'), 'fa fa-arrow-circle-right' => __('arrow-circle-right', 'tyros'), 'fa fa-arrow-circle-up' => __('arrow-circle-up', 'tyros'), 'fa fa-arrow-down' => __('arrow-down', 'tyros'), 'fa fa-arrow-left' => __('arrow-left', 'tyros'), 'fa fa-arrow-right' => __('arrow-right', 'tyros'), 'fa fa-arrow-up' => __('arrow-up', 'tyros'), 'fa fa-arrows' => __('arrows', 'tyros'), 'fa fa-arrows-alt' => __('arrows-alt', 'tyros'), 'fa fa-arrows-h' => __('arrows-h', 'tyros'), 'fa fa-arrows-v' => __('arrows-v', 'tyros'), 'fa fa-caret-down' => __('caret-down', 'tyros'), 'fa fa-caret-left' => __('caret-left', 'tyros'), 'fa fa-caret-right' => __('caret-right', 'tyros'), 'fa fa-caret-square-o-down' => __('caret-square-o-down', 'tyros'), 'fa fa-caret-square-o-left' => __('caret-square-o-left', 'tyros'), 'fa fa-caret-square-o-right' => __('caret-square-o-right', 'tyros'), 'fa fa-caret-square-o-up' => __('caret-square-o-up', 'tyros'), 'fa fa-caret-up' => __('caret-up', 'tyros'), 'fa fa-chevron-circle-down' => __('chevron-circle-down', 'tyros'), 'fa fa-chevron-circle-left' => __('chevron-circle-left', 'tyros'), 'fa fa-chevron-circle-right' => __('chevron-circle-right', 'tyros'), 'fa fa-chevron-circle-up' => __('chevron-circle-up', 'tyros'), 'fa fa-chevron-down' => __('chevron-down', 'tyros'), 'fa fa-chevron-left' => __('chevron-left', 'tyros'), 'fa fa-chevron-right' => __('chevron-right', 'tyros'), 'fa fa-chevron-up' => __('chevron-up', 'tyros'), 'fa fa-hand-o-down' => __('hand-o-down', 'tyros'), 'fa fa-hand-o-left' => __('hand-o-left', 'tyros'), 'fa fa-hand-o-right' => __('hand-o-right', 'tyros'), 'fa fa-hand-o-up' => __('hand-o-up', 'tyros'), 'fa fa-long-arrow-down' => __('long-arrow-down', 'tyros'), 'fa fa-long-arrow-left' => __('long-arrow-left', 'tyros'), 'fa fa-long-arrow-right' => __('long-arrow-right', 'tyros'), 'fa fa-long-arrow-up' => __('long-arrow-up', 'tyros'), 'fa fa-toggle-down' => __('toggle-down', 'tyros'), 'fa fa-toggle-left' => __('toggle-left', 'tyros'), 'fa fa-toggle-right' => __('toggle-right', 'tyros'), 'fa fa-toggle-up' => __('toggle-up', 'tyros'), 'fa fa-arrows-alt' => __('arrows-alt', 'tyros'), 'fa fa-backward' => __('backward', 'tyros'), 'fa fa-compress' => __('compress', 'tyros'), 'fa fa-eject' => __('eject', 'tyros'), 'fa fa-expand' => __('expand', 'tyros'), 'fa fa-fast-backward' => __('fast-backward', 'tyros'), 'fa fa-fast-forward' => __('fast-forward', 'tyros'), 'fa fa-forward' => __('forward', 'tyros'), 'fa fa-pause' => __('pause', 'tyros'), 'fa fa-play' => __('play', 'tyros'), 'fa fa-play-circle' => __('play-circle', 'tyros'), 'fa fa-play-circle-o' => __('play-circle-o', 'tyros'), 'fa fa-step-backward' => __('step-backward', 'tyros'), 'fa fa-step-forward' => __('step-forward', 'tyros'), 'fa fa-stop' => __('stop', 'tyros'), 'fa fa-youtube-play' => __('youtube-play', 'tyros'), 'fa fa-warning' => __('warning', 'tyros'), 'fa fa-adn' => __('adn', 'tyros'), 'fa fa-android' => __('android', 'tyros'), 'fa fa-apple' => __('apple', 'tyros'), 'fa fa-behance' => __('behance', 'tyros'), 'fa fa-behance-square' => __('behance-square', 'tyros'), 'fa fa-bitbucket' => __('bitbucket', 'tyros'), 'fa fa-bitbucket-square' => __('bitbucket-square', 'tyros'), 'fa fa-bitcoin' => __('bitcoin', 'tyros'), 'fa fa-btc' => __('btc', 'tyros'), 'fa fa-codepen' => __('codepen', 'tyros'), 'fa fa-css3' => __('css3', 'tyros'), 'fa fa-delicious' => __('delicious', 'tyros'), 'fa fa-deviantart' => __('deviantart', 'tyros'), 'fa fa-digg' => __('digg', 'tyros'), 'fa fa-dribbble' => __('dribbble', 'tyros'), 'fa fa-dropbox' => __('dropbox', 'tyros'), 'fa fa-drupal' => __('drupal', 'tyros'), 'fa fa-empire' => __('empire', 'tyros'), 'fa fa-facebook' => __('facebook', 'tyros'), 'fa fa-facebook-square' => __('facebook-square', 'tyros'), 'fa fa-flickr' => __('flickr', 'tyros'), 'fa fa-foursquare' => __('foursquare', 'tyros'), 'fa fa-ge' => __('ge', 'tyros'), 'fa fa-git' => __('git', 'tyros'), 'fa fa-git-square' => __('git-square', 'tyros'), 'fa fa-github' => __('github', 'tyros'), 'fa fa-github-alt' => __('github-alt', 'tyros'), 'fa fa-github-square' => __('github-square', 'tyros'), 'fa fa-gittip' => __('gittip', 'tyros'), 'fa fa-google' => __('google', 'tyros'), 'fa fa-google-plus' => __('google-plus', 'tyros'), 'fa fa-google-plus-square' => __('google-plus-square', 'tyros'), 'fa fa-hacker-news' => __('hacker-news', 'tyros'), 'fa fa-html5' => __('html5', 'tyros'), 'fa fa-instagram' => __('instagram', 'tyros'), 'fa fa-joomla' => __('joomla', 'tyros'), 'fa fa-jsfiddle' => __('jsfiddle', 'tyros'), 'fa fa-linkedin' => __('linkedin', 'tyros'), 'fa fa-linkedin-square' => __('linkedin-square', 'tyros'), 'fa fa-linux' => __('linux', 'tyros'), 'fa fa-maxcdn' => __('maxcdn', 'tyros'), 'fa fa-openid' => __('openid', 'tyros'), 'fa fa-pagelines' => __('pagelines', 'tyros'), 'fa fa-pied-piper' => __('pied-piper', 'tyros'), 'fa fa-pied-piper-alt' => __('pied-piper-alt', 'tyros'), 'fa fa-pied-piper-square' => __('pied-piper-square', 'tyros'), 'fa fa-pinterest' => __('pinterest', 'tyros'), 'fa fa-pinterest-square' => __('pinterest-square', 'tyros'), 'fa fa-qq' => __('qq', 'tyros'), 'fa fa-ra' => __('ra', 'tyros'), 'fa fa-rebel' => __('rebel', 'tyros'), 'fa fa-reddit' => __('reddit', 'tyros'), 'fa fa-reddit-square' => __('reddit-square', 'tyros'), 'fa fa-renren' => __('renren', 'tyros'), 'fa fa-share-alt' => __('share-alt', 'tyros'), 'fa fa-share-alt-square' => __('share-alt-square', 'tyros'), 'fa fa-skype' => __('skype', 'tyros'), 'fa fa-slack' => __('slack', 'tyros'), 'fa fa-soundcloud' => __('soundcloud', 'tyros'), 'fa fa-spotify' => __('spotify', 'tyros'), 'fa fa-stack-exchange' => __('stack-exchange', 'tyros'), 'fa fa-stack-overflow' => __('stack-overflow', 'tyros'), 'fa fa-steam' => __('steam', 'tyros'), 'fa fa-steam-square' => __('steam-square', 'tyros'), 'fa fa-stumbleupon' => __('stumbleupon', 'tyros'), 'fa fa-stumbleupon-circle' => __('stumbleupon-circle', 'tyros'), 'fa fa-tencent-weibo' => __('tencent-weibo', 'tyros'), 'fa fa-trello' => __('trello', 'tyros'), 'fa fa-tumblr' => __('tumblr', 'tyros'), 'fa fa-tumblr-square' => __('tumblr-square', 'tyros'), 'fa fa-twitter' => __('twitter', 'tyros'), 'fa fa-twitter-square' => __('twitter-square', 'tyros'), 'fa fa-vimeo-square' => __('vimeo-square', 'tyros'), 'fa fa-vine' => __('vine', 'tyros'), 'fa fa-vk' => __('vk', 'tyros'), 'fa fa-wechat' => __('wechat', 'tyros'), 'fa fa-weibo' => __('weibo', 'tyros'), 'fa fa-weixin' => __('weixin', 'tyros'), 'fa fa-windows' => __('windows', 'tyros'), 'fa fa-wordpress' => __('wordpress', 'tyros'), 'fa fa-xing' => __('xing', 'tyros'), 'fa fa-xing-square' => __('xing-square', 'tyros'), 'fa fa-yahoo' => __('yahoo', 'tyros'), 'fa fa-youtube' => __('youtube', 'tyros'), 'fa fa-youtube-play' => __('youtube-play', 'tyros'), 'fa fa-youtube-square' => __('youtube-square', 'tyros'), 'fa fa-ambulance' => __('ambulance', 'tyros'), 'fa fa-h-square' => __('h-square', 'tyros'), 'fa fa-hospital-o' => __('hospital-o', 'tyros'), 'fa fa-medkit' => __('medkit', 'tyros'), 'fa fa-plus-square' => __('plus-square', 'tyros'), 'fa fa-stethoscope' => __('stethoscope', 'tyros'), 'fa fa-user-md' => __('user-md', 'tyros'), 'fa fa-wheelchair' => __('wheelchair', 'tyros')
    );
    $bool_array = array(
        'yes' => __('Yes', 'tyros'),
        'no' => __('No', 'tyros')
    );
    $slider_style = array(
        'cover' => __('Cover', 'tyros'),
        '100% 100%' => __('Stretch', 'tyros'),
    );

    // Multicheck Array
    $multicheck_array = array(
        'one' => __('French Toast', 'tyros'),
        'two' => __('Pancake', 'tyros'),
        'three' => __('Omelette', 'tyros'),
        'four' => __('Crepe', 'tyros'),
        'five' => __('Waffle', 'tyros')
    );

    // Multicheck Defaults
    $multicheck_defaults = array(
        'one' => '1',
        'five' => '1'
    );

    // Background Defaults
    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment' => 'scroll');

    // Typography Defaults
    $typography_defaults = array(
        'size' => '15px',
        'face' => 'georgia');
    
    $width_array = array(
        'row1060' => '1060 px',
        'row1200' => '1200 px',
    );

    $font_size_array = array(
        '10px' => '10 px',
        '12px' => '12 px',
        '14px' => '14 px',
        '16px' => '16 px',
        '18px' => '18 px',
    );
    $font_family_array = array(
        'Arial, Helvetica, sans-serif' => 'Arial',
        'Arial Black, Gadget, sans-serif' => 'Arial Black',
        'Courier New, monospace' => 'Courier New',
        'Lobster, cursive' => 'Lobster - Cursive',
        'Georgia, serif' => 'Georgia',
        'Impact, Charcoal, sans-serif' => 'Impact',
        'Josefin Sans, sans-serif' => 'Josefin',
        'Lucida Console, Monaco, monospace' => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif' => 'Lucida Sans Unicode',
        'MS Sans Serif, Geneva, sans-serif' => 'MS Sans Serif',
        'MS Serif, New York, serif' => 'MS Serif',
        'Open Sans, sans-serif' => 'Open Sans',
        'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype',
        'Source Sans Pro, sans-serif' => 'Source Sans Pro',
        'Lato, sans-serif' => 'Lato',
        'Tahoma, Geneva, sans-serif' => 'Tahoma',
        'Times New Roman, Times, serif' => 'Times New Roman',
        'Trebuchet MS, sans-serif' => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif' => 'Verdana',
    );

    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ($options_tags_obj as $tag) {
        $options_tags[$tag->term_id] = $tag->name;
    }


    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/inc/images/';

    $options = array();

    // ------------------------------------------------------------------ Basic Settings
    $options[] = array(
        'name' => __('Header', 'tyros'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Logo', 'tyros'),
        'desc' => __('Your website Logo.', 'tyros'),
        'id' => 'tyros_logo_image',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Header Bar', 'tyros'),
        'desc' => __('Toggle the headerbar on or off', 'tyros'),
        'id' => 'tyros_headerbar_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array);

    $options[] = array(
        'name' => __('Facebook URL', 'tyros'),
        'desc' => __('Enter the URL for your Facebook Page', 'tyros'),
        'id' => 'tyros_facebook_url',
        'std' => 'https://www.facebook.com/SmartcatDesign',
        'type' => 'text');

    $options[] = array(
        'name' => __('Twitter URL', 'tyros'),
        'desc' => __('Enter the URL for your Facebook Page', 'tyros'),
        'id' => 'tyros_twitter_url',
        'std' => '#',
        'type' => 'text');

    $options[] = array(
        'name' => __('LinkedIn URL', 'tyros'),
        'desc' => __('Enter the URL for your LinkedIn Page', 'tyros'),
        'id' => 'tyros_linkedin_url',
        'std' => '#',
        'type' => 'text');

    $options[] = array(
        'name' => __('Google Plus URL', 'tyros'),
        'desc' => __('Enter the URL for your Google Plus Page', 'tyros'),
        'id' => 'tyros_gplus_url',
        'std' => '#',
        'type' => 'text');

    $options[] = array(
        'name' => __('Headerbar Link 1 Text', 'tyros'),
        'desc' => __('Input the title of the link, example: My Account', 'tyros'),
        'id' => 'tyros_store_link1_text',
        'std' => 'My Account',
        'type' => 'text');

    $options[] = array(
        'name' => __('Headerbar Link 1 path/URL', 'tyros'),
        'desc' => __('Input the url or path of the link, example: /my-account', 'tyros'),
        'id' => 'tyros_store_link1_url',
        'std' => '/my-account/',
        'type' => 'text');

    $options[] = array(
        'name' => __('Headerbar Link 2 Text', 'tyros'),
        'desc' => __('Input the title of the link, example: My Account', 'tyros'),
        'id' => 'tyros_store_link2_text',
        'std' => 'Cart',
        'type' => 'text');

    $options[] = array(
        'name' => __('Headerbar Link 2 path/URL', 'tyros'),
        'desc' => __('Input the url or path of the link, example: /my-account', 'tyros'),
        'id' => 'tyros_store_link2_url',
        'std' => '/cart/',
        'type' => 'text');

    $options[] = array(
        'name' => __('Headerbar Link 3 Text', 'tyros'),
        'desc' => __('Input the title of the link, example: My Account', 'tyros'),
        'id' => 'tyros_store_link3_text',
        'std' => 'Checkout',
        'type' => 'text');

    $options[] = array(
        'name' => __('Headerbar Link 3 path/URL', 'tyros'),
        'desc' => __('Input the url or path of the link, example: /my-account', 'tyros'),
        'id' => 'tyros_store_link3_url',
        'std' => '/checkout/',
        'type' => 'text');

    // ---------------------------------------------------------------------- Design
    
    $options[] = array(
        'name' => __('Design', 'tyros'),
        'type' => 'heading');
    
    $options[] = array(
        'name' => "Select theme skin color",
        'desc' => "This sets the main color of the theme",
        'id' => "tyros_theme_color",
        'std' => "red",
        'type' => "images",
        'options' => array(
            'green' => $imagepath . 'green.png',
            'violet' => $imagepath . 'violet.png',
            'red' => $imagepath . 'red.png')
    );
    
    $options[] = array(
        'name' => "Select background pattern",
        'desc' => "Set the pattern for the site background",
        'id' => "tyros_theme_background_pattern",
        'std' => "halftone",
        'type' => "images",
        'options' => array(
            'whitewall3' => $imagepath . 'witewall_3.png',
            'brickwall' => $imagepath . 'brickwall.png',
            'skulls' => $imagepath . 'skulls.png',
            'stardust' => $imagepath . 'stardust.png',
            'tweed' => $imagepath . 'tweed.png',
            'texturetastic_gray' => $imagepath . 'texturetastic_gray.png',
            'confectionary' => $imagepath . 'confectionary.png',
            'halftone' => $imagepath . 'halftone.png',
            'food' => $imagepath . 'food.png')
    );
    

    $options[] = array(
        'name' => __('Font Size', 'tyros'),
        'desc' => __('Main body font size', 'tyros'),
        'id' => 'tyros_font_size',
        'std' => '14px',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $font_size_array);
    
    $options[] = array(
        'name' => __('Font Family', 'tyros'),
        'desc' => __('font family for the website', 'tyros'),
        'id' => 'tyros_font_family',
        'std' => 'Josefin Sans, sans-serif',
        'type' => 'select',
        'class' => 'small', //mini, tiny, small
        'options' => $font_family_array);    
    
    //--------------------------------------------------------------------------- Homepage
    

    $options[] = array(
        'name' => __('Homepage', 'tyros'),
        'type' => 'heading');
    
    $options[] = array(
        'name' => "Select homepage design",
        'desc' => "Select to show or hide the homepage sidebar",
        'id' => "tyros_homepage_sidebar",
        'std' => "sidebar-off",
        'type' => "images",
        'options' => array(
            'sidebar-off' => $imagepath . '1col.png',
            'sidebar-on' => $imagepath . '2cr.png')
    );   
    
    $path = get_template_directory_uri() . '/inc/images/slide1_demo.jpg';    
    $options[] = array(
        'name' => __('Slider', 'tyros'),
        'desc' => __('Toggle the Slider on or off', 'tyros'),
        'id' => 'tyros_slider_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array);

    
    $options[] = array(
        'name' => __('Slide #1', 'tyros'),
        'desc' => __('First Slide', 'tyros'),
        'id' => 'tyros_slide1_image',
        'std' => $path,
        'type' => 'upload');
    
    $options[] = array(
        'name' => __('Slide #1 Caption 1', 'tyros'),
        'desc' => __('First Slide Text', 'tyros'),
        'id' => 'tyros_slide1_text',
        'std' => 'Tyros: Multi-purpose Responsive Theme',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Slide #1 Caption 2', 'tyros'),
        'desc' => __('First Slide Text', 'tyros'),
        'id' => 'tyros_slide1_text2',
        'std' => 'Woocommerce Supported',
        'type' => 'text');
    
    
    $options[] = array(
        'name' => __('Slide #1 Button Text', 'tyros'),
        'desc' => __('First Slide Button Text', 'tyros'),
        'id' => 'tyros_slide1_button_text',
        'std' => 'Click Here',
        'type' => 'text');
    
    
    $options[] = array(
        'name' => __('Slide #1 Button URL', 'tyros'),
        'desc' => __('First Slide Button URL', 'tyros'),
        'id' => 'tyros_slide1_button_url',
        'std' => '#',
        'type' => 'text');
    
    
    
    $path = get_template_directory_uri() . '/inc/images/slide2_demo.jpg';
    $options[] = array(
        'name' => __('Slide #2', 'tyros'),
        'desc' => __('Second Slide', 'tyros'),
        'id' => 'tyros_slide2_image',
        'std' => $path,
        'type' => 'upload');
    $options[] = array(
        'name' => __('Slide #2 Caption 1', 'tyros'),
        'desc' => __('Second Slide Text', 'tyros'),
        'id' => 'tyros_slide2_text',
        'std' => 'Reponsive with Bootstrap',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Slide #2 Caption 2', 'tyros'),
        'desc' => __('First Slide Text', 'tyros'),
        'id' => 'tyros_slide2_text2',
        'std' => 'Clean & Modern Design',
        'type' => 'text');    
    
    
    $options[] = array(
        'name' => __('Slide #2 Button Text', 'tyros'),
        'desc' => __('Second Slide Button Text', 'tyros'),
        'id' => 'tyros_slide2_button_text',
        'std' => 'Click Here',
        'type' => 'text');
    
    
    $options[] = array(
        'name' => __('Slide #2 Button URL', 'tyros'),
        'desc' => __('Second Slide Button URL', 'tyros'),
        'id' => 'tyros_slide2_button_url',
        'std' => '#',
        'type' => 'text');
    

    $options[] = array(
        'name' => __('Full Width Call Out text(under slider)', 'tyros'),
        'desc' => __('leave blank to hide callout', 'tyros'),
        'id' => 'tyros_cta_header_two',
        'std' => 'Tyros: Customizable, Professional, Beautiful',
        'type' => 'text');    

    $options[] = array(
        'name' => __('Full Width Call Out Button Text', 'tyros'),
        'desc' => __('Set the button text', 'tyros'),
        'id' => 'tyros_cta_button_text',
        'std' => 'Learn More',
        'type' => 'text');   
    
    $options[] = array(
        'name' => __('Full Width Call Out Button Link', 'tyros'),
        'desc' => __('Link the callout button redirects to', 'tyros'),
        'id' => 'tyros_cta_button_link',
        'std' => '#',
        'type' => 'text');    
    
 
    
    $options[] = array(
        'name' => __('Show 3 CTA Boxes', 'tyros'),
        'desc' => __('Toggle the CTAs on or off', 'tyros'),
        'id' => 'tyros_cta_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array);    
    
  // box 1
    $options[] = array(
        'name' => __('Box #1 Title', 'tyros'),
        'desc' => __('First box title', 'tyros'),
        'id' => 'tyros_cta1_title',
        'std' => 'Woo Commerce Supported',
        'type' => 'text');

    $options[] = array(
        'name' => __('Box #1 Icon', 'tyros'),
        'desc' => __('Icon for the first box', 'tyros'),
        'id' => 'tyros_cta1_icon',
        'std' => 'fa fa-shopping-cart',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $icon_array);

    $options[] = array(
        'name' => __('Box #1 Text', 'tyros'),
        'desc' => __('Textarea for Box #1', 'tyros'),
        'id' => 'tyros_cta1_text',
        'std' => 'Tyros is compatible with Woo Commerce',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Box #1 Link', 'tyros'),
        'desc' => __('URL box button links to', 'tyros'),
        'id' => 'tyros_cta1_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Box #1 Button Text', 'tyros'),
        'desc' => __('Set the text on the button', 'tyros'),
        'id' => 'tyros_cta1_button_text',
        'std' => 'Click Here',
        'type' => 'text');
    // box 2
    $options[] = array(
        'name' => __('Box #2 Title', 'tyros'),
        'desc' => __('First box title', 'tyros'),
        'id' => 'tyros_cta2_title',
        'std' => 'Font Awesome Icons',
        'type' => 'text');

    $options[] = array(
        'name' => __('Box #2 Icon', 'tyros'),
        'desc' => __('Icon for the second box', 'tyros'),
        'id' => 'tyros_cta2_icon',
        'std' => 'fa fa-briefcase',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $icon_array);

    $options[] = array(
        'name' => __('Box #2 Text', 'tyros'),
        'desc' => __('Textarea for Box #2', 'tyros'),
        'id' => 'tyros_cta2_text',
        'std' => 'Tyros is loaded with over 600 Font Awesome icons',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Box #2 Link', 'tyros'),
        'desc' => __('URL box button links to', 'tyros'),
        'id' => 'tyros_cta2_url',
        'std' => '',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Box #2 Button Text', 'tyros'),
        'desc' => __('Set the text on the button', 'tyros'),
        'id' => 'tyros_cta2_button_text',
        'std' => 'Click Here',
        'type' => 'text');
    //box3
    $options[] = array(
        'name' => __('Box #3 Title', 'tyros'),
        'desc' => __('Third box title', 'tyros'),
        'id' => 'tyros_cta3_title',
        'std' => 'Easy customization',
        'type' => 'text');

    $options[] = array(
        'name' => __('Box #3 Icon', 'tyros'),
        'desc' => __('Icon for the third box', 'tyros'),
        'id' => 'tyros_cta3_icon',
        'std' => 'fa fa-tachometer',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $icon_array);

    $options[] = array(
        'name' => __('Box #3 Text', 'tyros'),
        'desc' => __('Textarea for Box #3', 'tyros'),
        'id' => 'tyros_cta3_text',
        'std' => 'Theme Options that allow you to easily customize the theme',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Box #3 Link', 'tyros'),
        'desc' => __('URL box button links to', 'tyros'),
        'id' => 'tyros_cta3_url',
        'std' => '',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Box #3 Button Text', 'tyros'),
        'desc' => __('Set the text on the button', 'tyros'),
        'id' => 'tyros_cta3_button_text',
        'std' => 'Click Here',
        'type' => 'text');
    

    // ---------------------------------------------------------------------- Templates
    
    $options[] = array(
        'name' => __('Templates', 'tyros'),
        'type' => 'heading');
    
    $options[] = array(
        'name' => "Blog Page Layout",
        'desc' => "Select full-width or right sidebar page layout",
        'id' => "tyros_blog_layout",
        'std' => "col2r",
        'type' => "images",
        'options' => array(
            'col1' => $imagepath . '1col.png',
            'col2r' => $imagepath . '2cr.png',
    ));        
    
    $options[] = array(
        'name' => __('Blog Featured Images','tyros'),
        'desc' => __('Show or Hide the post images on the blog page', 'tyros'),
        'id' => 'tyros_blog_featured',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));
        
    $options[] = array(
        'name' => "Single Post Layout",
        'desc' => "Select full-width or right sidebar page layout",
        'id' => "tyros_single_layout",
        'std' => "col2r",
        'type' => "images",
        'options' => array(
            'col1' => $imagepath . '1col.png',
            'col2r' => $imagepath . '2cr.png',
    ));      
    
    $options[] = array(
        'name' => __('Single Post Featured Images','tyros'),
        'desc' => __('Show or Hide the post images on a single post', 'tyros'),
        'id' => 'tyros_single_featured',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));  
    
    
    $options[] = array(
        'name' => __('Single Post Date','tyros'),
        'desc' => __('Show or Hide the Posted On post date', 'tyros'),
        'id' => 'tyros_single_date',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));  
    
    $options[] = array(
        'name' => __('Single Post Author','tyros'),
        'desc' => __('Show or Hide the post author', 'tyros'),
        'id' => 'tyros_single_author',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));  
    
    
    /*------------------------------------------------------ Footer -----------*/
    $options[] = array(
        'name' => __('Footer', 'tyros'),
        'type' => 'heading');
    $options[] = array(
        'name' => __('Number of Columns','tyros'),
        'desc' => __('How many columns is the footer', 'tyros'),
        'id' => 'tyros_footer_columns',
        'std' => 'col-md-4',
        'type' => 'select',
        'options' => $footer_columns);
    
    $options[] = array(
        'name' => __('Paypal Icon','tyros'),
        'desc' => __('Show or Hide the Paypal Icon', 'tyros'),
        'id' => 'tyros_paypal',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));
    
    $options[] = array(
        'name' => __('Visa Icon','tyros'),
        'desc' => __('Show or Hide the Visa Icon', 'tyros'),
        'id' => 'tyros_visa',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));
    
    $options[] = array(
        'name' => __('Matercard Icon','tyros'),
        'desc' => __('Show or Hide the Mastercard Icon', 'tyros'),
        'id' => 'tyros_mastercard',
        'std' => 'on',
        'type' => 'radio',
        'options' => array(
            'on' => 'Show',
            'off' => 'Hide',
        ));
    
    $options[] = array(
        'name' => __('Footer Text', 'tyros'),
        'desc' => __('Enter text for the footer', 'tyros'),
        'id' => 'tyros_footer_text',
        'std' => '&#169; 2014 Your company name',
        'type' => 'textarea');

    return $options;
}

add_action('optionsframework_after', 'tyros_options_display_sidebar');
function tyros_options_display_sidebar() { ?>
    <div class="width30 left ml2p">

        <div class="center">
            <img class="smartcat-icon" src="<?php echo OPTIONS_FRAMEWORK_DIRECTORY; ?>images/smartcat_wordpress.png"/>
        </div>

        <div class="sc-tab-option">
            <a href="http://smartcatdesign.net/preview/tyros" target="_blank">
                View Theme Demo
            </a>
        </div>

        <div class="sc-tab-option">
            <a href="https://smartcatdesign.net/downloads/tyros/" target="_blank">
                Get Tyros Pro
            </a>
        </div>
        
        <h3>Tyros Pro Features: </h3>
        <ul>
            <li>- 10 Skin colors</li>
            <li>- Up to 5 slides in the slider</li>
            <li>- Customize Slider time, height and transition effects</li>
            <li>- 10 Slider transition effects</li>
            <li>- Animated Ajax Contact Form</li>
            <li>- Custom CSS & JavaScript</li>
            <li>- Team Member Management</li>
            <li>- WooCommerce Compatible</li>
            <li>- Favicon Upload</li>
            <li>- Remove Smartcat branding</li>
            <li>- Masonry Tiles Blog</li>
            
            
        </ul>
        
    </div>
<?php } ?>