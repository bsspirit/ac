<div class="mybox">
	 <div class="title">
	 	<strong class="name">行业新闻</strong>
	 </div>
	 <div class="content">
	 	<div class="news">
		 	<ul>
		 	<?php foreach($news as $new){?>
		 		<li>
		 			<?php echo CHtml::link($new->title, array('prod/detail',"pid"=>$new->id))?>
		 			<span class="r w80"><?php echo substr($new->create_date,0,10)?></span>
		 		</li>
		 	<?php }?>
		 	</ul>
	 	</div>
	 </div> 
</div>