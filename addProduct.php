<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<?php include('config.php'); 
// REGISTER USER
if (isset($_POST['addP'])) {
    // receive all input values from the form
    $pname = mysqli_real_escape_string($conn, $_POST['pName']);
    $ptype = mysqli_real_escape_string($conn, $_POST['pType']);
    $pqty = mysqli_real_escape_string($conn, $_POST['pQty']);
    $pmea = mysqli_real_escape_string($conn, $_POST['pMeasure']);
    $pcost = mysqli_real_escape_string($conn, $_POST['pCost']);
    $pimg = mysqli_real_escape_string($conn, $_POST['pImg']);
  
    
    $query = "INSERT INTO products (name, type, cost, img) 
              VALUES('$pname', '$ptype', '$pcost', '$pimg')";
    if($conn->query($sql) === TRUE)
    {
      header('location: addProduct.php');
    }
    else
    {
      echo  "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
?>

<div class="row">
</div><br><br>
<div class="sub-title" style="font-size: 15px;"><p><a href="index.php">Home</a> <a style="color:var(--purple)"> > Add Product</a></p>
<hr></div>
 <form class="center1" method="post" action="addProduct.php">
      <h2>Add Product</h2>
    <div class="input-group">
      <label>Name:</label>
      <input type="text" name="pName">
    </div>
    <div class="input-group">
      <label>Type:</label>
      <input type="text" name="pType" list="pTypes">
      <datalist id="pTypes">
        <option value="Earbuds">
        <option value="Earphones">
        <option value="Headphones">
        <option value="Speaker">
        <option value="Accessories">
      </datalist>
    </div>
    <div class="input-group">
      <label>Cost:</label>
      <input type="text" name="pCost">
    </div>
    <div class="input-group">
      <label>Product Image:</label>
      <input type="text" name="pImg" id="pImg" placeholder="imgs/pId.png">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="addP">Add Product</button>
    </div>
  </form>

<div class="footer">
  <h2>Footer</h2>
</div>
</body>
</html>