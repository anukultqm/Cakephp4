<?php

$this->Breadcrumbs->add([
    ['title' => 'view', 'url' => ['controller' => 'Users', 'action' => 'view',6]],
    ['title' => 'Edit', 'url' => ['controller' => 'Users', 'action' => 'edit', 6]]
]);

$this->Breadcrumbs->setTemplates([
    'wrapper' => '<nav class="breadcrumbs"><ul{{attrs}}>{{content}}</ul></nav>',
    'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render(['separator' => '<i class="fa fa-angle-right"></i>']
);

?>