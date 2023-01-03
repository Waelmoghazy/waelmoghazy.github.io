<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Product</title>
</head>
<body>
    <div>
	    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="add" id="add" onsubmit="return validate_form();">
                <input name="save" id="save" type="submit" value="SAVE" onclick="return validate_form();">
                <input name="cancel" id="cancel" type="button" value="CANCEL" onclick="cancelproduct();">
                   <label for="SKU">
                   <h4>SKU</h4>
                        <input id="SKU" type="text" name="SKU" placeholder="Please, provide Product Code">
                    </label>
                    <label for="name">
                        <h4>Name</h4>
                        <input id="name" type="text" name="name" placeholder="Please, provide Product Name">
                    </label>
                    <label for="price">
                        <h4>Price</h4>
                        <input id="price" type="number" name="price" placeholder="Please, provide Product Price">
                    </label>
                    <label for="type">
                        <h4>Type Switcher (Select the Product Type)</h4>
                    </label>
                    <button id="DVD-Disc" value="1" name="DVD-Disc" type="button" onclick="showDisc()">DVD-Disc</button>
                    <button id="Book" value="2" name="Book" type="button" onclick="showBook()">Book</button>
                    <button id="Furniture" value="3" name="Furniture" type="button" onclick="showFurniture()">Furniture</button>
                    <div id="imp1"></div>
                    <div id="imp"></div>
                    <div id="delete"></div>
        </form>
	</div>
    <script src="main.js"></script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once "crreupde.php";
    $crreupde = new crreupde();
    if (isset($_POST['save'])) {
        $crreupde->create();
        header('Location: '.$_SERVER['PHP_SELF']);
    } 
    if (isset($_POST['SKU'])) {
        $crreupde->setSKU($_POST['SKU']);
        $crreupde->delete();
        header('Location: '.$_SERVER['PHP_SELF']);
    }else{
        echo('Please provide the product SKU code?');
    }
}
?>
