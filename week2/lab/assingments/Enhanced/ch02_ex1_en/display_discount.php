<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
       <div id="content">
        <?php 
        
        // get form data
        $product_description = $_POST['product_description'];
        $list_price = $_POST['list_price'];
        $discount_percent = $_POST['discount_percent'];
        
         // calculations
        $discount = $list_price * $discount_percent * .01;
        $discount_price = $list_price - $discount;
        
        // format dollar and percent 
        $list_price_formatted = "$".  number_format($list_price, 2);
        $discount_percent_formatted = $discount_percent."%";
        $discount_formatted = "$". number_format($discount, 2);
        $discount_price_formatted = "$".  number_format($discount_price, 2);
  
        
        //validations
        //Product Description
        if (empty($product_description)){
            $error_message = 'Product description is a required field.';
        }
         else if (!is_string($product_description) ) {
        $errorMsg = 'Description must not be empty';
        }
         
        // discount
        if (empty($discount_percent)){
        $error_message = 'Discount percent is a required field.'; }
        else if (!is_numeric($discount_percent)){
            $error_message = 'Discount percent must be a number.'; }
        
        // list price
        if (empty($list_price)){
        $error_message = 'List price is a required field.'; }
        else if (!is_numeric($list_price)){
            $error_message = 'List price must be a valid number.'; }
            
 
            
        // use error messgage if no form data is blank
        else {
            $error_message = ''; }
        // final validation
        if ($error_message != '') {
            include('index.php');
            exit();
        }
    ?>
                        
        
       
        <h2>Product Discount Calculator</h2>

        <label>Product Description:</label>
        <span name="pdescrip"><?php echo $product_description; ?></span><br />

        <label>List Price:</label>
        <span name="lprice"><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $disc_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $disc_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $disc_price_formatted; ?></span><br />

        <p>&nbsp;</p>
    </div>
</body>
</html>