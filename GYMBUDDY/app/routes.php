<?php

$routes = [
    '' => ['controller' => 'home', 'method' => 'index'],

    //login and signup routes
    'index' => ['controller' => 'home', 'method' => 'index'],
    'about' =>['controller'=>'home','method'=>'about'],
    'signup' => ['controller' => 'AuthController', 'method' => 'index'],
    'register' => ['controller' => 'AuthController', 'method' => 'register'],
    'login' => ['controller' => 'AuthController', 'method' => 'loginIndex'],
    'log' => ['controller' => 'AuthController', 'method' => 'login'],
    'logout' => ['controller' => 'AuthController', 'method' => 'logout'],
    // User dashboard route
    'accounts' => ['controller' => 'AuthController', 'method' => 'showUsers'],
    'addaccounts' => ['controller' => 'AuthController', 'method' => 'registerAll'],
    'addacc' => ['controller' => 'AuthController', 'method' => 'AddAccIndex'],
    'updateUser' => ['controller' => 'AuthController', 'method' => 'update'],

    //admin routes
    'dashboard' => ['controller' => 'Admin', 'method' => 'index'],
    'addproduct' => ['controller' => 'Admin', 'method' => 'Add'],
    'view' => ['controller' => 'Admin', 'method' => 'viewProducts'],
    'updateProfile' => ['controller' => 'AuthController', 'method' => 'updateIndex'],
    'update' => ['controller' => 'AuthController', 'method' => 'update'],

    //contact form
    'contact' => ['controller' => 'Contacts', 'method' => 'ContactIndex'],
    'filled?' => ['controller' => 'Contacts', 'method' => 'fill'],

    //Add product routes
    'add' => ['controller' => 'ProductController', 'method' => 'addProduct'],
    'product' => ['controller' => 'ProductController', 'method' => 'ViewProduct'],
    'viewproduct' => ['controller' => 'ProductController', 'method' => 'showProducts'],
    'deleteproduct' => ['controller' => 'ProductController', 'method' => 'deleteProduct'],
    'updateproduct' => ['controller' => 'ProductController', 'method' => 'updateProduct'],
    'getproduct/{id}' => ['controller' => 'ProductController', 'method' => 'getProductById'],  
    'category/{product_category}' => ['controller' => 'ProductController', 'method' => 'showCategoryProducts'], 
    
    'productPage' => ['controller' => 'ProductController', 'method' => 'ProductPage'], 

    'glutamin' => ['controller' => 'ProductController', 'method' => 'showGlutamin'],
    'creatine' => ['controller' => 'ProductController', 'method' => 'showCreatine'],
    'energy' => ['controller' => 'ProductController', 'method' => 'showEnergy'],
    'fat' => ['controller' => 'ProductController', 'method' => 'showFat'],
    'mass' => ['controller' => 'ProductController', 'method' => 'showMass'],
    'protein' => ['controller' => 'ProductController', 'method' => 'showProtein'],
    'test' => ['controller' => 'ProductController', 'method' => 'showTest'],
    'vitamin' => ['controller' => 'ProductController', 'method' => 'showVitamin'],
     
    // Service routes
    'adds' => ['controller' => 'Admin', 'method' => 'addS'],
    'addservice' => ['controller' => 'ServiceController', 'method' => 'addService'],
    'viewservice' => ['controller' => 'ServiceController', 'method' => 'showServices'],
    'cview' => ['controller' => 'ServiceController', 'method' => 'ViewServices'],

    'cview1' => ['controller' => 'CustomerServiceController', 'method' => 'viewServicesByCategory'],

    'deleteservice' => ['controller' => 'ServiceController', 'method' => 'deleteService'],
    'updateservice' => ['controller' => 'ServiceController', 'method' => 'updateService'],
    'getservice/{id}' => ['controller' => 'ServiceController', 'method' => 'getServiceById'],

    'cart' => ['controller' => 'ProductController', 'method' => 'showCart'],
    'addToCart' => ['controller' => 'ProductController', 'method' => 'addToCart'],
    'removeFromCart' => ['controller' => 'ProductController', 'method' => 'removeFromCart'],

];
?>
