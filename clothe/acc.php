<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>
	<title>品牌故事</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/acc.css"/>
    <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.4.4&key=2134f559aa8cf861aac5a583b4592b40&plugin=AMap.Geocoder"></script>
    <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
</head>
<body onload="geocoder()">
	<?php 
		include_once("inc/header.php");
	 ?>
	 <?php 
		include_once("inc/head.php");
	 ?>
	 <div class="acc-first">
	 	<div class="index-first-nav">
			<div class="acc-first-title">
				<div>Latest Information</div>
				<div>联系我们</div>
				<div>———</div>
			</div>
			<div class="acc-second-nav">
				<div class="acc-second-first">
					<img src="image/phone.png">
					<div>4008-123-123</div>
				</div>
				<div class="acc-second-first">
					<img src="image/home.png">
					<div>XXX省XXX市XXX县XXX路XXX号</div>
				</div>
				<div class="acc-second-first">
					<img src="image/email.png">
					<div>jiangsh1196@163.com</div>
				</div>
			</div>
			<div class="acc-third-nav">
				<div id="tip">
				    <span id="result"></span>
				</div>
				<div id="container"></div>
			</div>
	 	</div>
	 </div>
	 <?php 
		include_once("inc/footer.php");
	 ?>

	 <script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript">
         var map = new AMap.Map("container", {
	        resizeEnable: true
	    });
        function geocoder() {
        var geocoder = new AMap.Geocoder({
            city: "010", //城市，默认：“全国”
            radius: 1000 //范围，默认：500
        });
        //地理编码,返回地理编码结果
        geocoder.getLocation("北京市海淀区苏州街", function(status, result) {
            if (status === 'complete' && result.info === 'OK') {
                geocoder_CallBack(result);
            }
        });
    }
    function addMarker(i, d) {
        var marker = new AMap.Marker({
            map: map,
            position: [ d.location.getLng(),  d.location.getLat()]
        });
        var infoWindow = new AMap.InfoWindow({
            content: d.formattedAddress,
            offset: {x: 0, y: -30}
        });
        marker.on("mouseover", function(e) {
            infoWindow.open(map, marker.getPosition());
        });
    }
    //地理编码返回结果展示
    function geocoder_CallBack(data) {
        var resultStr = "";
        //地理编码结果数组
        var geocode = data.geocodes;
        for (var i = 0; i < geocode.length; i++) {
            //拼接输出html
            resultStr += "<span style=\"font-size: 12px;padding:0px 0 4px 2px; border-bottom:1px solid #C1FFC1;\">" + "<b>地址</b>：" + geocode[i].formattedAddress + "" + "&nbsp;&nbsp;<b>的地理编码结果是:</b><b>&nbsp;&nbsp;&nbsp;&nbsp;坐标</b>：" + geocode[i].location.getLng() + ", " + geocode[i].location.getLat() + "" + "<b>&nbsp;&nbsp;&nbsp;&nbsp;匹配级别</b>：" + geocode[i].level + "</span>";
            addMarker(i, geocode[i]);
        }
        map.setFitView();
        document.getElementById("result").innerHTML = resultStr;
    }
    
</script>
</body>
</html>