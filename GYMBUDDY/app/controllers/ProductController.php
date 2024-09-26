<?php

class ProductController extends Controller {

    public function addProduct() {
        if (isset($_POST['submit'])) {

            $product_name = $_POST['product_name'];
            $product_category = $_POST['product_category'];
            $product_brand = $_POST['product_brand'];
            $product_price = $_POST['product_price'];
            $product_stock = $_POST['product_stock'];
            $product_description = $_POST['product_description'];

            // Check if the file is uploaded and valid
            if (isset($_FILES['product_image_1']) && is_uploaded_file($_FILES['product_image_1']['tmp_name'])) {
                $filename = $_FILES["product_image_1"]["name"];
                $file_tmp = $_FILES["product_image_1"]["tmp_name"];
                $upload_dir = "uploads/";
                $folder = $upload_dir . $filename;

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Check if copy is successful
                if (copy($file_tmp, $folder)) {
                    $display_message = "File uploaded successfully!";
                } else {
                    $display_message = "File upload failed!";
                    $folder = ''; // Set folder to empty if file upload fails
                }
            } else {
                // Handle the case where no file is uploaded
                $folder = ''; // No image uploaded
            }

            // Proceed with adding product to the database
            $product = $this->model('ProductModel');
            $product->addProduct($product_name, $product_category,$product_brand, $product_price, $product_stock, $product_description, $folder); 
            header("Location: " . BASE_URL . "/addproduct");
            exit;
        }
    }

    
    public function showProducts() {
        // Start the session if not started already
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
    
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    
        
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Add Product";
            $product = $this->model('ProductModel'); 
            $products = $product->getProducts();    
            $data['products'] = $products;
            $this->view('products/ViewProduct', $data);

        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }



    public function deleteProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $product = $this->model('ProductModel');
            $product->deleteProductById($id);

            header("Location: " . BASE_URL . "/viewproduct");
            exit();
        }
        }
    }


    public function updateProduct() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $product_name = $_POST['product_name'];
            $product_category = $_POST['product_category'];
            $product_brand = $_POST['product_brand'];
            $product_price = $_POST['product_price'];
            $product_stock = $_POST['product_stock'];
            $product_description = $_POST['product_description'];

            // Check if a new file is uploaded
            if (isset($_FILES['product_image_1']) && is_uploaded_file($_FILES['product_image_1']['tmp_name'])) {
                $filename = $_FILES["product_image_1"]["name"];
                $file_tmp = $_FILES["product_image_1"]["tmp_name"];
                $upload_dir = "uploads/";
                $folder = $upload_dir . $filename;

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                if (!copy($file_tmp, $folder)) {
                    $folder = ''; // In case copy fails, use an empty string
                }
            } else {
                // If no new file is uploaded, maintain the previous image
                $product = $this->model('ProductModel');
                $existingProduct = $product->getProductById($id);
                $folder = $existingProduct->product_image_1; // Keep the old image
            }

            // Update the product
            $product = $this->model('ProductModel');
            $product->updateProductById($id, $product_name, $product_category, $product_price, $product_stock, $product_description, $folder);
            header("Location: " . BASE_URL . "/viewproduct");
            exit();
        }
    }
    public function getProductById($id) {
        $product = $this->model('ProductModel');
        $productDetails = $product->getProductById($id);
        //js show deatils
        echo json_encode($productDetails);
    }


    // i need to show men category products only ProductView page
    public function showMenProducts() {
        $product = $this->model('ProductModel');
        $products = $product->getMenProducts();
        $data['products'] = $products;
        $data['page_title'] = "Men";
        $this->view('MenView', $data);
    }
    public function showCategoryProducts($categoryName) {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Fetch products for the specified category
        $product = $this->model('ProductModel');
        $products = $product->getProductsByCategory($categoryName);
        
        if (!$products) {
            // No products found for the category
            $_SESSION['error'] = "No products found for the category: " . htmlspecialchars($categoryName);
            // Optionally, redirect to a default products page or show a message
        }

        $data['products'] = $products;
        $data['page_title'] = htmlspecialchars($categoryName) . " Products";

        $this->view('products/index', $data);
    }
    public function ViewProduct()
    {
        $data['page_title'] = "Products";
        $this->view("products/index", $data);
    }
    public function Products()
    {
        $data['page_title'] = "Products";
        $this->view("products/products", $data);
    }
    // public function showsProducts($category) {
    //     $products = $this->productModel->getProductsByCategory($category);
    //     $this->view('products/index', ['products' => $products, 'category' => $category]);
    // }
    public function showGlutamin() {
        $product = $this->model('ProductModel');
        $products = $product->getAllGlutamin();
        $data['products'] = $products;
        $data['page_title'] = "Glutamin and Amino";
        $this->view('p_cat/glutamin', $data);
    }


    public function showCreatine() {
        $product = $this->model('ProductModel');
        $products = $product->getAllCreatine();
        $data['products'] = $products;
        $data['page_title'] = "Creatine";
        $this->view('p_cat/creatine', $data);
    }
    public function showEnergy() {
        $product = $this->model('ProductModel');
        $products = $product->getAllEnergyDrinks();
        $data['products'] = $products;
        $data['page_title'] = "Energy Drinks";
        $this->view('p_cat/energydrink', $data);
    }


    public function showFat() {
        $product = $this->model('ProductModel');
        $products = $product->getAllFatBurners();
        $data['products'] = $products;
        $data['page_title'] = "Fat Burners";
        $this->view('p_cat/fatburners', $data);
    }
    public function showMass() {
        $product = $this->model('ProductModel');
        $products = $product->getAllMassGainers();
        $data['products'] = $products;
        $data['page_title'] = "Mass Gainers";
        $this->view('p_cat/massgainers', $data);
    }


    public function showProtein() {
        $product = $this->model('ProductModel');
        $products = $product->getAllProteinBars();
        $data['products'] = $products;
        $data['page_title'] = "Proteins";
        $this->view('p_cat/proteinbars', $data);
    }
    public function showTest() {
        $product = $this->model('ProductModel');
        $products = $product->getAllTestosterone();
        $data['products'] = $products;
        $data['page_title'] = "Testestorone";
        $this->view('p_cat/testosterone', $data);
    }


    public function showVitamin() {
        $product = $this->model('ProductModel');
        $products = $product->getAllVitamin();
        $data['products'] = $products;
        $data['page_title'] = "Vitamins";
        $this->view('p_cat/vitamin', $data);
    }
    public function ProductPage(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $productModel = $this->model('ProductModel');
            $product = $productModel->getProductById($id);
            
            if ($product) {
                $data['product'] = $product;
                $this->view('products/Product', $data);
            } else {
                // Redirect to home page if product is not found
                header("Location: " . BASE_URL . "/home");
                exit();
            }
        } else {
            // Redirect to home page if no product ID is provided
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }
    // Method to handle adding a product to the cart
    public function addToCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Get product ID from POST request
        if (isset($_POST['id'])) {
            $product_id = $_POST['id'];

            // Check if cart session is already initialized
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Check if the product is already in the cart
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += 1; // Increment quantity
            } else {
                // Fetch product details from the database using ProductModel
                $productModel = $this->model('ProductModel');
                $product = $productModel->getProductById($product_id);

                if ($product) {
                    // Add the product to the cart with quantity 1
                    $_SESSION['cart'][$product_id] = [
                        'id' => $product->id,
                        'name' => $product->product_name,
                        'price' => $product->product_price,
                        'image' => $product->product_image_1,
                        'quantity' => 1
                    ];
                }
            }

            // Redirect to the cart view page
            header("Location: " . BASE_URL . "/cart");
            exit();
        }
    }

    // Method to show cart contents
    public function showCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Get the current cart contents
        $cart = $_SESSION['cart'] ?? [];

        $data['cart'] = $cart;
        $data['page_title'] = "Your Cart";

        // Load the cart view
        $this->view('cart/cart', $data);
    }

    // Method to remove a product from the cart
    public function removeFromCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Get product ID from POST request
        if (isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];

            // Remove the product from the cart
            if (isset($_SESSION['cart'][$product_id])) {
                unset($_SESSION['cart'][$product_id]);
            }

            // Redirect back to the cart page
            header("Location: " . BASE_URL . "/cart");
            exit();
        }
    }
}
    
    

