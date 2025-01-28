<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <style>
    .cart tr{
      font-size: large;
    }
    .cart td{
      font-size: large;
    }
    .btn{
      float: right;
      margin: 20px;
      height: 60px;
      width: 250px;
      font-size: 23px;
      letter-spacing: 2px;
      font-weight: bold;
      border-radius: 8px;
    }
    .btn:hover{
      float: right;
      margin: 20px;
      height: 60px;
      width: 250px;
      font-size: 23px;
      letter-spacing: 2px;
      font-weight: bold;
      border-radius: 8px;
    }
  </style>
</head>
<body>
<?php include('config.php'); ?>
<!--#42dcff --> 
<div class="row">
</div><br><br>
<div class="sub-title" style="font-size: 15px;"><p><a href="index.php">Home</a> <a style="color:grey"> > Cart</a></p>
<hr></div>
<div class="row">
<?php
    $uid = $_SESSION['user'];

    $sql = "SELECT * FROM users WHERE username='$uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uid  = $row["userid"];

    $sql = "SELECT * FROM cart LEFT JOIN products ON cart.pid=products.pid WHERE uid='$uid'";
    $result = $conn->query($sql);
    $resultset = array();
    // output data of each row into resultset
    while($row = $result->fetch_assoc()) 
    {
        $resultset[] = $row;
    }

    echo "<table class='cart' id='cart'>
    <thead>
    <tr>
    <th colspan='2' style='width:29%; padding-left:20px;'>Product</th>
    <th style='width:20%;'>Price</th>
    <th style='width:20%;'>Quantity</th>
    <th style='width:15%;'>Subtotal</th>
    </tr>
    </thead>
    <tbody>";
    $total = 0;
    foreach ($resultset as $r)
    {
      echo "<tr>
      <td><img src='$r[img]'></td>
      <td style='width:25%; text-align:left;'>$r[name]</td>
      <td>₹$r[cost]</td>
      <td>
        <img src='icons/minushover.png' onclick='minus($r[pid],\"$r[name]\")' style='vertical-align:bottom; height:30px; width:30px;'>
        <input type='text' id='qty$r[pid]' value='$r[cqty]'>
        <img src='icons/plushover.png' onclick='plus($r[pid])' style='vertical-align:bottom; height:30px; width:30px;'>
      </td>
      <td>₹$r[subcost]</td>
      </tr>";
      $total += $r[subcost];
    }
    echo "<tr>
      <td colspan='4' style='font-size:25px; font-weight:normal; padding:15px 15px;'>Total</td>
      <td style='color: var(--pink); font-size:30px; font-weight:normal;'>₹$total</td>
      </tr>";
    echo"</tbody></table>";
    echo"</tbody></table> 
        <div class='input-group'>
      <button class='btn' name='pay' onclick='pay($total)'>CheckOut➜</button>
    </div>";
?>
<br>

<div class="footer">
  <h2>Footer</h2>
</div>

<script>
function calcTotal(x)
{ 
  x.innerHTML='<img src="icons/addcarthover.png" class="card-icons-small" id="addcart"><p>ADD</p>';
  x.style.backgroundColor = "#42dcff";
  x.style.color = "white";
}

function plus(pid)
{
  var ids = "qty"+pid;
  document.getElementById(ids).value = parseInt(document.getElementById(ids).value) + 1;
  addQty(pid);
}

function minus(pid, product)
{
  var ids = "qty"+pid;
  document.getElementById(ids).value = parseInt(document.getElementById(ids).value) - 1;
  var value = parseInt(document.getElementById(ids).value);
  if(value <= 0)
  {
    var r = confirm("Do you wish to remove "+product+" from your cart?");
    if (r == true)
      addQty(pid);
    else 
      document.getElementById(ids).value = 1;
  }
  else
  {
    addQty(pid);
  }
}

function addQty(pid)
{
  var ids = "qty"+pid;
  var qty = parseInt(document.getElementById(ids).value); 
  window.location.href = "addCart.php?pid="+pid+"&qty="+qty;
}

function pay(amt)
{
  if(document.getElementById("cart").rows.length <= 2)
  {
    alert("Add some items in your cart in order to check out!");
  }
  else
    window.location.href = "shipDetails.php?amt="+amt;
}
</script>

</body>
</html>
