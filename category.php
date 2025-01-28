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
<?php

  $category = $_GET['category'];
  echo "<div class='sub-title' style='font-size: 15px;'><p><a href='index.php'>Home</a> >
        $category</p>
        <hr></div> <div class='row'>";
    $sql = "SELECT * FROM products WHERE type = '$category'";
    $result = $conn->query($sql);
    $resultset = array();
    // output data of each row into resultset
    while($row = $result->fetch_assoc()) 
    {
        $resultset[] = $row;
    }
    foreach ($resultset as $r)
  	{		
      	echo "<div class='columns'>
      <div class='card'>
          <div class='product-imgs'><img src='$r[img]'></div>
          <h3>$r[name]</h3>
          <div class='desc'>$r[qty] $r[measure]</div>
          <button class='addCart' id='$r[pid]' onclick='addQty(this)'><img src='icons/cart.png' class='card-icons-small' id='addcart'>ADD</button>  
          <div class='cost'>₹$r[cost]</div>
      </div>
    </div>";
  	}
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
	window.location.href = "addCart.php?pid="+ids;
}

</script>

</body>
</html>
