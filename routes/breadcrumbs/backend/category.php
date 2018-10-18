<?php

Breadcrumbs::for('admin.category.update', function ($trail) {
    $trail->parent('admin.category');
    $trail->push(__('admin.category.update'), url('admin.category.update'));
});
Breadcrumbs::for('admin.category.add', function ($trail) {
    $trail->parent('admin.category');
    $trail->push(__('menus.backend.access.category.add'), url('admin.category.add'));
});

Breadcrumbs::for('admin.product.add', function ($trail) {
    $trail->parent('admin.product');
    $trail->push(__('menus.backend.access.product.add'), url('admin.product.add'));
});


