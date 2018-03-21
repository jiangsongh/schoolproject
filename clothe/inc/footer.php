<?php 
		if(strpos($_SERVER['REQUEST_URI'],'index.php')){
	 		$flag = 0;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'brand.php')){
	 		$flag = 1;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'fashion.php')){
	 		$flag = 2;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'product.php')){
	 		$flag = 3;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'acc.php')){
	 		$flag = 4;
	 	}
	 ?>
	 <div class="index-five">
		<div class="index-first-nav">
			<div class="index-first-nav-img">
				<img src="image/indexFootCenter.png">
			</div>
			<div class="index-first-nav-text">
				<ul>
					<li><a href="index.php">首页</a></li>
					<li>|</li>
					<li><a href="brand.php">品牌故事</a></li>
					<li>|</li>
					<li><a href="fashion.php">时尚资讯</a></li>
					<li>|</li>
					<li><a href="product.php">商品展示</a></li>
					<li>|</li>
					<li><a href="acc.php">绅士配饰</a></li>
				</ul>
				<div class="index-footer-bottom">© 2018 Bestseller. All Rights Reserved 津ICP备12007886号 - 1</div>
				<div class="index-footer-bottom">Coo 高级私人西装定制（江苏）有限公司</div>
			</div>
		</div>
	</div>