<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<style type="text/css">
		.center1 {
			text-align: center;
			margin: auto;
		  	width: 60%;
			margin-top: 80px;
			margin-bottom: 40px;
			padding: 60px 80px;
		}
		.center1 h1{
		  	padding: 0;
		  	margin: 0;
		  	color: var(--lblue);
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
		.center1 img{
			height: 100px;
			width: 100px;
		}
	</style>
</head>
<body>
<?php include('config.php');?>
	<div class="center1"><img src="icons/check.png"><br><br>
		<h1 style="text-align:center;">Payment Successfull!!</h1><br>
		<div class="input-group">
  			<button class="btn" name="okay" onclick="okay()">Okay</button>
		</div>
	</div>
<script type="text/javascript">
	function okay() 
	{
		window.location.href = "index.php";
	}
</script>
</body>
</html>
