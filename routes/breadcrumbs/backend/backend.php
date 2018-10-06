<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});
Breadcrumbs::for('admin.category', function ($trail) {
    $trail->push(__('strings.backend.category.offer.title'), route('admin.category'));
});
Breadcrumbs::for('admin.product', function ($trail) {
    $trail->push(__('strings.backend.product.offer.title'), route('admin.product'));
});
Breadcrumbs::for('admin.category.edit', function ($trail, $id) {
    $trail->parent('admin.category');
    $trail->push(__('menus.backend.access.category.edit'), route('admin.category.edit', $id));
});
Breadcrumbs::for('admin.product.edit', function ($trail, $id) {
    $trail->parent('admin.product');
    $trail->push(__('menus.backend.access.product.edit'), route('admin.product.edit', $id));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/category.php';

