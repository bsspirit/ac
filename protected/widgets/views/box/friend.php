<?php $basepath=Yii::app()->request->baseUrl;?>
<script type="text/javascript" src="<?php echo $basepath ?>/js/friend/jcarousellite_1.0.1.pack.js"></script>
<script type="text/javascript">
	$(function() {
	    $(".marquee").jCarouselLite({
	        auto: 1000,
    		speed: 1000,
    		vertical: true,
    		visible: 4
	    });
	});
</script>
<div class="mybox">
	 <div class="title">
	 	<strong class="name">合作伙伴</strong>
	 </div>
	 <div class="content">
		 <div class="marquee">
		    <ul>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/1.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/2.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/3.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/4.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/5.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/6.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/11.jpg"/></a></li>
		        <li><a href="#"><img width="180" src="<?php echo $basepath ?>/upfiles/friend/12.jpg"/></a></li>
		    </ul>
		</div>
	 </div> 
</div>