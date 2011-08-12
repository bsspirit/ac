<div class="view">

	<ul>
	<?php foreach($rows as $row){?>
		<li class="l">
			<a href="detail/pid/<?php echo $row->id?>">
				<img width="128" height="107" alt="<?php echo $row->title?>" src="<?php echo $row->image_url?>"/>
			</a>
			<br/>
			<?php echo CHtml::link(CHtml::encode($row->title), array('prod/detail', 'pid'=>$row->id)); ?>
		</li>
	<?php }?>
	</ul>
	<div class="c"></div>


</div>