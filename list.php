<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <style type="text/css">
    .center1 {
      margin: auto;
      width: 60%;
      margin-top: 80px;
      margin-bottom: 40px;
      padding: 60px 80px;
      color:#5c5c5c; 
      border: 3px solid lightgrey;
    }
    .center1 h1{
      padding: 0;
      margin: 0;
    }
    .center1 h2{
      font-weight: normal;
      padding: 0;
      margin: 0;
      margin-top: 5px;
    }
    .center1 h3{
      font-weight: normal;
      padding: 0;
      margin: 0;
      margin-top: 5px;
    }
  </style>
</head>
<body>
<?php include('config.php'); ?>
<!--#42dcff --> 
<div class="row">
</div><br><br>
<div class="sub-title" style="font-size: 15px;"><p><a href="index.php">Home</a><a style="color:#5c5c5c;"></a></p>
<hr></div>
<div class="row">
<?php
	$ogvalue = $_GET['searchval'];
	$value=ucfirst(strtolower($ogvalue));
    $sql = "SELECT * FROM products WHERE name LIKE '%$value%' OR type LIKE '%$value%'";
    $result = $conn->query($sql);
    $resultset = array();
    // output data of each row into resultset
    while($row = $result->fetch_assoc()) 
    {
        $resultset[] = $row;
    }
    if($resultset)
    	foreach ($resultset as $p)
    	{		
	      echo "<div class='columns'>
          <div class='card'>
            <div class='product-imgs'>
              <img src='$p[img]'>
              <button class='heart' id='$p[pid]' onclick='addWish(this)'>❤</button> 
            </div>
              <h3>$p[name]</h3>
              <button class='addCart'  id='$p[pid]' onclick='addQty(this)'><img src='icons/cart.png' class='card-icons-small' id='addcart'>Add</button>  
              <div class='cost'>₹$p[cost]</div>
          </div>
        </div>";
    	}
    else
    	echo "<div class='center1'><h1>Hmmm...</h1><h2>We couldn't find any matches for \"$ogvalue\".</h2><h3>Double check your search for any typos or spelling errors - or try a different search term.</h3></div>"
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

function addWish(x)
{
  var ids = x.id;
  window.location.href = "addWish.php?pid="+ids+"&qty=1";
}
</script>

</body>
</html>
