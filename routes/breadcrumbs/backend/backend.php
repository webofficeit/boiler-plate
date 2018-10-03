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

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/category.php';

