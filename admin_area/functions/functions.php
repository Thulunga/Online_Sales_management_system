<?php  
$db = mysqli_connect("localhost", "root", "", "ecom");


function getProCat(){
	global $db;
	$get_p_cat = "select * from product_categories";
	$run_p_cat = mysqli_query($db, $get_p_cat);
	while ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
		$p_cat_id = $row_p_cat['p_cat_id'];
		$p_cat_title = $row_p_cat['p_cat_title'];
		echo "
		<li><a href='../shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
		";
	}
}


?>