<?php

class Core_Controller_Front_Action
{
  protected $_layout = null;
  public function __construct()
  {
    $this->init();
    // echo "Core_Controller_Front_Action";
    $layout = $this->getLayout();
    $layout->getChild("head")
      ->addCss("header.css")
      ->addCss("footer.css");
  }
  public function init(){
    return $this;
  }


  public function getLayout()
  {
    if (is_null($this->_layout)) {  //check krva mate null che ke nai layout
      $this->_layout = Mage::getBlock("core/layout");//core_block_layout
      return $this->_layout;
    }
    return $this->_layout;
  }

  public function getRequest()
  {
    return Mage::getModel("core/request");
  }



public function setFormCss($file)
{
    $layout = $this->getLayout();
    $layout->getChild('head')
        ->addCss($file.'.css');
}

public function setRedirect($url){
  $url=Mage::getBaseUrl() . $url;
  header('Location:'.$url);
}

public function postdataActionProceed() {  
   // Retrieve logged-in customer ID from session
   $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");
    
   // Check if a customer is logged in
   if ($customerId) {
       // Retrieve cart data from persistent storage
       $cartData = $this->getCartData();
       
       // Get the product ID from the request
       $productId = $this->getRequest()->getQueryData('id');
       
       // Check if the product ID is valid and exists in the cart
       if (!empty($productId) && isset($cartData[$customerId][$productId])) {
           // Display product information for the specified product
           $product = $cartData[$customerId][$productId];
           echo '<h2>Product Details</h2>';
           echo 'Product ID: ' . $productId . '<br>';
           echo 'Quantity: ' . $product['quantity'] . '<br>';
           // You can display other product details here as needed
       } else {
           echo '<h2>Product Not Found in Cart</h2>';
       }
   } else {
      $this->setRedirect("customer/account/login");
   }
}

public function getCartData() {
  // This is a simplified example; you should replace this with your actual logic
  if (file_exists('cart_data.json')) {
      $cartData = json_decode(file_get_contents('cart_data.json'), true);
  } else {
      $cartData = array();
  }
  return $cartData;
}

  // Function to save cart data
  private function saveCartData($cartData) {
      // Save cart data to persistent storage
      file_put_contents('cart_data.json', json_encode($cartData));
  }

  public function removeActionProceed() {
    $productId = $this->getRequest()->getQueryData('id'); // Get the product ID from the URL parameter

    if(Mage::getSingleton("core/session")->get("logged_in_customer_id")){

        // Check if product ID is valid (you may need additional validation)
        if (!empty($productId)) {
            // Remove the product from the cart
            $this->removeFromCart($productId);
            echo "Product with ID $productId removed from cart successfully.";
            // Redirect back to the previous page or wherever you want
            // header('Location: previous_page.php');
            exit; // Stop further execution
        } else {
            echo "Invalid product ID.";
        }
    }
    else{
      $this->setRedirect("customer/account/login");
    }
}

private function removeFromCart($productId) {
  // Retrieve cart data from persistent storage
  $cartData = $this->getCartData();

  // Get the logged-in customer ID from the session
  $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");

  // Check if a customer is logged in
  if ($customerId) {
      // Check if the product exists in the cart for the logged-in customer
      if (isset($cartData[$customerId][$productId])) {
          // Remove the product from the cart
          unset($cartData[$customerId][$productId]);

          // Save the updated cart data back to persistent storage
          $this->saveCartData($cartData);

          echo "Product with ID $productId removed from cart successfully.";
      } else {
          echo "Product with ID $productId not found in the cart.";
      }
  } else {
    $this->setRedirect("customer/account/login");
  }
}


public function linkActionProceed(){
  $productId = $this->getRequest()->getQueryData('id'); 

  // Check if product ID is valid
  if (!empty($productId)) {
      // Add the product to the cart
      $this->addToCart($productId);
      echo "Product with ID $productId added to cart successfully.";
  } else {
      echo "Invalid product ID.";
  }
}

private function addToCart($productId) {
  // Get the logged-in customer ID from the session
  $customerId = Mage::getSingleton("core/session")->get("logged_in_customer_id");

  // Retrieve cart data from persistent storage
  $cartData = $this->getCartData();

  // Initialize cart data if not already set for the customer
  if (!isset($cartData[$customerId])) {
      $cartData[$customerId] = array();
  }

  // Add the product to cart
  if (isset($cartData[$customerId][$productId])) {
      // Increment quantity if product already exists
      $cartData[$customerId][$productId]['quantity'] += 1; 
  } else {
      // Add a new product to the cart
      $cartData[$customerId][$productId] = array(
          'id' => $productId,
          'quantity' => 1 // Default quantity is 1
      );
  }

  // Save updated cart data to persistent storage
  $this->saveCartData($cartData);
}

}

?>