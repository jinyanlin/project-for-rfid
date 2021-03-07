<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<h1 align="center">客房服務</h1>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<?php 
		if(@$_SESSION['username']==null)
		{
			//echo ("顧客您好!<br>您尚未登入");
			echo '<h2><a href="login.php"> 登入</a>';
			echo '<a href="homepage.php"> 回首頁</a></h2>';
			//echo '/<a href="index_form.html"> 註冊</a>';
		}else
		{
			echo '<h2>';
			echo $_SESSION['username'];
			echo '貴賓您好';
			echo '<a href="logout.php"> 登出</a>';
			echo '<a href="homepage.php"> 回首頁</a></h2>';

		}
?>
<div class="txt-heading">目前選擇產品</div>

<a id="btnEmpty" href="product_buy.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">名稱</th>
<th style="text-align:left;">代碼</th>
<th style="text-align:right;" width="5%">數量</th>
<th style="text-align:right;" width="10%">單位價格</th>
<th style="text-align:right;" width="10%">總價格</th>
<th style="text-align:center;" width="5%">刪除商品</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="product_buy.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php

				$DBNAME = "table";
				$DBUSER = "root";
				$DBPASSWD = "";
				$DBHOST = "localhost";

				$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD,$DBNAME);
				$i=0;
				//echo 
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				
				if(!empty($_SESSION["cart_item"])){				
					$_SESSION['name'] = $item["name"];
					$_SESSION['quantity'] = $item["quantity"];
					$_SESSION['price'] = $item["price"];
					$_SESSION['totalprice'] = $total_price;
				}
		}
		?>

      <tr>
                  <td colspan="2" align="right">總共</td>
                  <td align="right"><?php echo $total_quantity; ?></td>
                  <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                  <td></td>
      </tr>
      <tr>
                  <td colspan="5" align="right">&nbsp;</td>
                  <td>
				  <form action="<?php 
				  	if($_SESSION['username']!=null){
						echo 'valid_product.php';
					}?>" method="POST">
                  <input type="submit" name="submit" id="submit" value="送出">
                  </td>
               
      </tr>
    </tbody>
 
                </form>
</table>		
  <?php
} else {
?>
<div class="no-records">購物車是空的，請選擇以下產品</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">食物(套餐)</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="product_buy.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="加入購物車" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
    

</div>

</BODY>
</HTML>