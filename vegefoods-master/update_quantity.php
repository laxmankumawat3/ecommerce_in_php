<?php
if(isset($_POST['quantity'])){
    $quantity = $_POST['quantity'];
    
    // Do something with the quantity value, for example, store it in a session variable
    session_start();
    $_SESSION['quantity'] = $quantity;
    
    // You can also perform other server-side operations here
    
    echo "Quantity updated successfully"; // Optional: Send a response back to the client
}
?>
