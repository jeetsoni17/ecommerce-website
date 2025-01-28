<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
</head>
<body>
<?php include('config.php'); ?>
<!--#42dcff --> 
<div class="row">
</div><br><br>
<div class="sub-title" style="font-size: 15px;"><p><a href="index.php">Home</a> <a style="color:#5c5c5c;"> > Wish List</a></p>
<hr></div>
<div class="row">
<?php
    $uid = $_SESSION['user'];

    $sql = "SELECT * FROM users WHERE username='$uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uid  = $row["userid"];

    $sql = "SELECT * FROM wishlist LEFT JOIN products ON wishlist.pid=products.pid WHERE uid='$uid'";
    $result = $conn->query($sql);
    $resultset = array();
    // output data of each row into resultset
    while($row = $result->fetch_assoc()) 
    {
        $resultset[] = $row;
    }

    foreach ($resultset as $p)
    {
      echo "<div class='columns'>
          <div class='card'>
            <div class='product-imgs'>
              <img src='$p[img]'>
              <button class='cross' id='$p[pid]' onclick='remWish(this,\"$p[name]\")'>✕</button> 
            </div>
              <h3>$p[name]</h3>
              <button class='addCart'  id='$p[pid]' onclick='addQty(this)'><img src='icons/cart.png' class='card-icons-small' id='addcart'>Add</button>  
              <div class='cost'>₹$p[cost]</div>
          </div>
        </div>";
    }
      echo "</div><br>";
?>
</div>
<br>

<div class="footer">
  <h2>Footer</h2>
</div>

<script>
function addQty(x)
{
  var ids = x.id;
  window.location.href = "addCart.php?pid="+ids+"&qty=1";
}
function remWish(x, product)
{
  var ids = x.id;
  var r = confirm("Do you wish to remove "+product+" from wishlist?");
  if (r == true)
    window.location.href = "addWish.php?pid="+ids+"&qty=0";
}
</script>
</body>
</html>
