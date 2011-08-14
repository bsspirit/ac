<div class="view">
	<ul class="pic_ul">
	<?php foreach($rows as $row){?>
		<li class="l w160 h150">
			<a href="../prod/detail/pid/<?php echo $row->id?>">
				<img width="140" height="115" alt="<?php echo $row->title?>" src="<?php echo Yii::app()->request->baseUrl.$row->image_url?>"/>
			</a>
			<br/>
			<?php echo CHtml::link(CHtml::encode($row->title), array('prod/detail', 'pid'=>$row->id)); ?>
		</li>
	<?php }?>
	</ul>
	<div class="c"></div>
</div>