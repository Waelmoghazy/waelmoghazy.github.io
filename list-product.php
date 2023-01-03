<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='productcss.css'>
        <title>List-Product</title>
    </head>
    <body>
    



<form method='post' name='main' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<div class='container'>
    <div><h1>Product List</h1>
    <input type='submit' name='deleteaction' id='deleteaction' onclick='return validate_form_delete();' value='MASS DELETE'>
    <input type='button' name='goaddproduct' id='goaddproduct' onclick='location.href="add-product.php";' value='ADD'>
    </div>
    
    <?php
    include_once "crreupde.php";
    $crreupde = new crreupde();
    $discarray = $crreupde->readdisc();
    $bookarray = $crreupde->readbook();
    $furniturearray = $crreupde->readfurniture();
    foreach ($discarray as $row){
        echo "<div class='material' name='check' id='check'>
        <input class='delete-checkbox' type='checkbox' value='".$row['SKU']."' name='checkout[]' /><br>
        <label>".$row['SKU']."</label><br>
        <label>".$row['name']."</label><br>
        <label>".$row['price']."$</label><br>
        <label>Size: ".$row['size']."MB</label>
	    </div>";
    }
    foreach ($bookarray as $row){
        echo "<div class='material' name='check' id='check'>
        <input class='delete-checkbox' type='checkbox' value='".$row['SKU']."' name='checkout[]' /><br>
        <label>".$row['SKU']."</label><br>
        <label>".$row['name']."</label><br>
        <label>".$row['price']."$</label><br>
        <label>Weight: ".$row['weight']."KG</label>
	    </div>";
    }
    foreach ($furniturearray as $row){
        echo "<div class='material' name='check' id='check'>
        <input class='delete-checkbox' type='checkbox' value='".$row['SKU']."' name='checkout[]' /><br>
        <label>".$row['SKU']."</label><br>
        <label>".$row['name']."</label><br>
        <label>".$row['price']."$</label><br>
        <label>Dimention: ".$row['height']."x".$row['width']."x".$row['length']."</label>
	    </div>";
    }
    ?>
    </div>
</form>

<script src="main.js"></script>
</body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['checkout'])) {
    $arraytodelete = $_POST['checkout'];
    $crreupde = new crreupde();
    foreach($arraytodelete as $element){
        $crreupde->setSKU($element);
        $crreupde->delete();
        header('Location: '.$_SERVER['PHP_SELF']);
    }
  }
?>

