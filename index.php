
<?php 
function create_uuid($prefix=""){
	$chars = md5(uniqid(mt_rand(), true));
	$uuid = substr ( $chars, 0, 8 ) . '-'
		. substr ( $chars, 8, 4 ) . '-'
		. substr ( $chars, 12, 4 ) . '-'
		. substr ( $chars, 16, 4 ) . '-'
		. substr ( $chars, 20, 12 );
	return $prefix.$uuid ;
}
function randomkeys($length) { 
 $pattern = 'abcdefghijklmnopqrstuvwxyz';
 for($i=0;$i<$length;$i++) 
 { 
  $key .= $pattern{mt_rand(0,35)}; //生成php随机数 
 } 
 return $key; 
} 

if (isset($_COOKIE["usid"])){}
else{setcookie("usid", create_uuid(""), time()+86400);}
$config = json_decode(file_get_contents("db.db"),true);
switch ($_GET['action']) {
	case 'apply' :
		if($_GET['phone']!="" && $_GET['name'] != "" && $_GET['serial'] !="" && $_GET['class'] != "null"){
			$tmp["phone"]=$_GET['phone'];
			$tmp["name"]=$_GET['name'];
			$tmp["serial"]=$_GET['serial'];
			$tmp["class"]=$_GET['class'];
			$tmp["usid"]=$_COOKIE["usid"];
			$tmp["time"]=time();
			$config[create_uuid("")] = $tmp;
			file_put_contents('db.db',json_encode($config));
			$msg = "预约面试成功！";
		}
		else $msg = "请填写完整信息！";
		break;
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>桑梓面试</title>
	<!-- for-mobile-apps -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- //for-mobile-apps -->
	<link rel="stylesheet" href="css/j-forms.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js" ></script>
	<?php if ($msg) { ?>
	<script type="text/javascript">
		alert("<?php echo $msg ?>");
		document.location = './index.php';
	</script>
	<?php } ?>
</head>

<body>
	<div class="content">
		<h1><img src="sends_logo.png" width=70% /><br>面试排队预约</h1>
		<div class="main">
			<form class="contact-forms" action="index.php">
			
				<!-- end /.header-->
				<input type="text" name="action" value="apply" style="display:none;">
				<!-- start name -->
				
				<div class="first-line">
					<div class="span6 main-row">
						<div class="input">

							<input type="text" name="name" placeholder="姓名">
						</div>
					</div>
					<div class="span6 main-row">
						<div class="input">

							<input type="text" name="serial" placeholder="学号">
						</div>
					</div>
				</div>
				<!-- end name -->
				

				<!-- start city post code -->
				<div class="first-line">
					<div class="span8 main-row">
						<div class="input">

							<input type="text" placeholder="电话" name="phone">
						</div>
					</div>

				</div>
				<div class="first-line">
					<div class="span8 main-row">
						<div class="input">
							<select name="class" placeholder="部门">
								<option value="null">-部门-</option>
								<option value="ch">策划</option>
								<option value="yw">运维</option>
								<option value="mg">美工</option>
								<option value="yy">运营</option>
								<option value="rj">软件</option>
							</select>
						</div>
					</div>

				</div>
				<!-- end city post code -->

				<!-- start address -->
				<!-- start message -->
				<!-- end /.content -->

				<div class="footer">
				
					<button type="submit" class="primary-btn">预约</button>
				</div>
				<!-- end /.footer -->

			</form>
		</div>
		<?php 
		foreach ($config as $msid => $data){
			if ($data["usid"] == $_COOKIE["usid"]){
				$idd = randomkeys(6)
			
		?>
		<div class="main">
			<h2 style="color:gray; font-size: 18px; font-family: 'Questrial', sans-serif;"><?php 
			switch ($data["class"]){
				case "ch":{echo "策划部";
				break;}
				case "mg":{echo "美工部";
				break;}
				case "yy":{echo "运营部";
				break;}
				case "yw":{echo "运维部";
				break;}
				case "rj":{echo "软件部";
				break;}
				default: {echo "系统错误";
				break;}
			}
			
			?> 面试<h2>
				<div style="height: 6px;"></div>
				<hr />
				<div style="height: 6px;"></div>
			<h2 id="<?php echo $idd;?>">等待排队......</h2>
			<script type="text/javascript">
			function <?php echo $idd;?>test() {
	        $.ajax(
	    	{
			type: 'GET',
			timeout : 3000,
			url: 'query.php',
			data: {
				'msid': "<?php echo $msid;?>"
			},
			success: function(data) {
				$("#<?php echo $idd;?>").html(data);
			},
			dataType: 'text',
			error: function() {
				$("#<?php echo $idd;?>").html("请检查网络连接");
			}
		}
	);
}
setTimeout("<?php echo $idd;?>test()",1000);
setInterval("<?php echo $idd;?>test()",30000);</script>			
			<form class="contact-forms" action="index.php" method="post">
	
				<div class="footer">
					<button type="submit" class="primary-btn">刷新</button>
				</div>
				<!-- end /.footer -->

			</form>
		</div>
<?php }}?>




		<p class="copy_rights">&copy; Sends.cc</p>
	</div>
	<!-- Scripts -->


	<!--[if lt IE 10]>
				<script src="j-folder/js/jquery.placeholder.min.js"></script>
			<![endif]-->
</body>

</html>