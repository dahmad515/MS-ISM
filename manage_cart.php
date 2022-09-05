<?php
session_start();
if (isset($_POST['cart_btn']))
{
    if (isset($_SESSION['cart']))
    {
        $myitems = array_column($_SESSION['cart'], 'Item_Name');
        if (in_array($_POST['Item_Name'], $myitems))
        {
            echo "<script>
					alert('Item Already Added To the Cart');
					window.location.href = 'index.php';
				</script>";
        }
        else
        {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array(
                'product_id' => $_POST['product_id'],
                'Item_Name' => $_POST['Item_Name'],
                'quantity' => $_POST['quantity'],
                'img_src' => $_POST['img_src'],
                'price' => $_POST['price'],
            );
            echo "<script>
					alert('Item Added');
					window.location.href = 'index.php#books';
				</script>";
        }
    }
    else
    {
        $_SESSION['cart'][0] = array(
            'product_id' => $_POST['product_id'],
            'Item_Name' => $_POST['Item_Name'],
            'quantity' => $_POST['quantity'],
            'img_src' => $_POST['img_src'],
            'price' => $_POST['price']
        );
        echo "<script>
					alert('Item Added');
					window.location.href = 'index.php#books';
				</script>";
    }
}

//for single Product
if (isset($_POST['single_cart_btn']))
{
    if (isset($_SESSION['cart']))
    {
        $myitems = array_column($_SESSION['cart'], 'Item_Name');
        if (in_array($_POST['Item_Name'], $myitems))
        {
            $pub_id = $_POST['Pub_id'];
            echo "<script>
					alert('Item Already Added To the Cart');
					window.location.href = 'single_product.php?pro_id=" . $_POST['product_id'] . "&Pub_id=".$pub_id."';
				</script>";
        }
        else
        {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array(
                'product_id' => $_POST['product_id'],
                'Item_Name' => $_POST['Item_Name'],
                'quantity' => $_POST['quantity'],
                'img_src' => $_POST['img_src'],
                'price' => $_POST['price'],
            );
            echo "<script>
					alert('Item Added');
                    window.location.href = 'single_product.php?pro_id=" . $_POST['product_id'] . "&Pub_id=".$pub_id."';
				</script>";
        }
    }
    else
    {
        $_SESSION['cart'][0] = array(
            'product_id' => $_POST['product_id'],
            'Item_Name' => $_POST['Item_Name'],
            'quantity' => $_POST['quantity'],
            'img_src' => $_POST['img_src'],
            'price' => $_POST['price'],
        );
        echo "<script>
					alert('Item Added');
					window.location.href = 'single_product.php?pro_id=" . $_POST['product_id'] . "';
				</script>";
    }
}

//Remove Item From Cart
if (isset($_POST['remove_btn']))
{
    foreach ($_SESSION['cart'] as $key => $value)
    {
        if ($value['Item_Name'] == $_POST['Item_Name'])
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>
					alert('Item Removed');
					window.location.href = 'cart.php';
				</script>";
        }
    }
}

//Change quantity of item
if (isset($_POST['mod_quantity']))
{
    foreach ($_SESSION['cart'] as $key => $value)
    {
        if ($value['Item_Name'] == $_POST['Item_Name'])
        {

            $_SESSION['cart'][$key]['quantity'] = $_POST['mod_quantity'];
            echo "<script>
					window.location.href = 'cart.php';
				</script>";
        }
    }
}

?>
