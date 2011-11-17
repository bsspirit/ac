<li class="l w160 h150">
	<a href="<?php echo Yii::app()->createUrl("prod/detail",array("pid"=>$data['id']))?>">
		<img width="140" height="115" alt="<?php echo $data['title']?>" src="<?php echo Yii::app()->request->baseUrl.$data['image_url']?>"/>
	</a>
	<br/>
	<?php echo CHtml::link(CHtml::encode($data['title']), array('prod/detail', 'pid'=>$data['id'])); ?>
</li>
