<?php 
class Catalog_Controller_Category extends Core_Controller_Front_Action {

    // protected   $_addToCart = [];
    public function viewAction()
    {
        $this->setFormCss("view");
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); //core_block_layout
        $productForm = $layout->createBlock('catalog/admin_category_list');
        $child->addChild('list',$productForm);
        $layout->toHtml();
    }

    // public function linkAction() {
    //     $productId = $this->getRequest()->getQueryData('id'); // Get the product ID from the GET parameter
    //     // echo $productId;
    
    //     // Check if product ID is valid (you may need additional validation)
    //     if (!empty($productId)) {
    //         // Assuming addToCart() is a method in your application to add the product to cart
    //         $this->addToCart($productId);
    //         echo "Product with ID $productId added to cart successfully.";
    //     } else {
    //         echo "Invalid product ID.";
    //     }
    // }
    
    // // Function to add product to cart
    // private function addToCart($productId) {
    //     // Retrieve cart data from persistent storage
    //     $cartData = $this->getCartData();
    
    //     // Add the product to cart
    //     if (isset($cartData[$productId])) {
    //         $cartData[$productId]['quantity'] += 1; // Increment quantity if product already exists
    //     } else {
    //         $cartData[$productId] = array(
    //             'id' => $productId,
    //             'quantity' => 1 // Assuming default quantity is 1
    //         );
    //     }
    
    //     // Save updated cart data back to persistent storage
    //     $this->saveCartData($cartData);
    // }
    
    // // Function to retrieve cart data from persistent storage
    // private function getCartData() {
    //     // This is a simplified example; you should replace this with your actual database or storage retrieval logic
    //     // For demonstration purposes, we use a simple array
    //     if (file_exists('cart_data.json')) {
    //         $cartData = json_decode(file_get_contents('cart_data.json'), true);
    //     } else {
    //         $cartData = array();
    //     }
    //     return $cartData;
    // }
    
    // // Function to save cart data to persistent storage
    // private function saveCartData($cartData) {
    //     // This is a simplified example; you should replace this with your actual database or storage saving logic
    //     // For demonstration purposes, we use a simple JSON file
    //     file_put_contents('cart_data.json', json_encode($cartData));
    // }


    public function linkAction() {
        // Get the product ID from the GET parameter
      $this->linkActionProceed();
    }

    // Function to add product to cart
// Function to add product to cartprivate function addToCart($productId) {
  // Function to add product to cart



//     // Save updated cart data to persistent storage
//     $this->saveCartData($cartData);
// }

// Function to retrieve cart data from persistent storage


    // Function to get request object (replace this with your framework's equivalent)
    // private function getRequest() {
    //     // Return the request object
    //     return $_REQUEST; // Replace this with your framework's request handling
    // }

    public function removeAction(){
        $this->removeActionProceed(); 
    }


  
    
    // // Function to remove product from cart
  

    // public function removeAction() {
    //     // Get the product ID from the URL parameter
    //     $productId = $this->getRequest()->getQueryData('id'); 
    
    //     // Check if product ID is valid
    //     if (!empty($productId)) {
    //         // Remove the product from the cart
    //         $this->removeFromCart($productId);
    //         echo "Product with ID $productId removed from cart successfully.";
    //         // Redirect back to the previous page or wherever you want
    //         // header('Location: previous_page.php');
    //         exit; // Stop further execution
    //     } else {
    //         echo "Invalid product ID.";
    //     }
    // }
    
    // Function to remove product from cart
    // private function removeFromCart($productId) {
    //     // Get the logged-in customer ID from the session
    //     $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");
    
    //     // Check if customer ID exists in the session
    //     if ($customerId && isset($_SESSION['cart'][$customerId][$productId])) {
    //         // Remove the product from the cart
    //         unset($_SESSION['cart'][$customerId][$productId]);
    //     }
    // }
    

    public function postdataAction() {  
       $this->postdataActionProceed();
    }
    


    // public function postdataAction() {  
    //     // Retrieve cart data from session
    //     if (isset($_SESSION['cart'])) {
    //         // Get the product ID from the request
    //         $productId = $this->getRequest()->getQueryData('id'); 
    //         $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");

    
    //         // Check if the product ID is valid and exists in the cart
    //         if (!empty($productId) && isset($_SESSION['cart'][$customerId][$productId])) {
    //             // Display product information for the specified product
    //             $product = $_SESSION['cart'][$customerId][$productId];
    //             echo '<h2>Product Details</h2>';
    //             echo 'Product ID: ' . $productId . '<br>';
    //             echo 'Quantity: ' . $product['quantity'] . '<br>';
    //             // You can display other product details here as needed
    //         } else {
    //             echo '<h2>Product Not Found in Cart</h2>';
    //         }
    //     } else {
    //         echo '<h2>No Products in Cart</h2>';
    //     }
    // }
    
    
    
    

    // function getCartData() {
    //     // This is a simplified example; you should replace this with your actual mechanism to retrieve cart data
    //     // For demonstration purposes, we use a simple JSON file
    //     if (file_exists('cart_data.json')) {
    //         $cartData = json_decode(file_get_contents('cart_data.json'), true);
    //     } else {
    //         $cartData = array();
    //     }
    //     return $cartData;
    // }
    
}
?>