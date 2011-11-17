<div class="view">
	<p class="rline" style="margin-right:10px;">第 1-2 条, 共 <?php echo $total?> 条.</p>
	<ul class="pic_ul">
	<?php foreach($rows as $row){?>
		<li class="l w160 h150">
			<a href="<?php echo Yii::app()->createUrl("prod/detail",array("pid"=>$row['id']))?>">
				<img width="140" height="115" alt="<?php echo $row['title']?>" src="<?php echo Yii::app()->request->baseUrl.$row['image_url']?>"/>
			</a>
			<br/>
			<?php echo CHtml::link(CHtml::encode($row['title']), array('prod/detail', 'pid'=>$row['id'])); ?>
		</li>
	<?php }?>
	</ul>
	<div class="c"></div>
</div>