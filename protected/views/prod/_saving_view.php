<div class="view">
<table width="96%" cellspacing="0" cellpadding="0" border="0" align="center">
	<tr>
  		<td width="150" valign="top" height="100">
  			<a target="_blank" title="<?php echo CHtml::encode($data['title']); ?>" href="detail/pid/<?php echo $data['id']?>">
  				<img width="128" height="107" border="0" src="<?php echo Yii::app()->request->baseUrl . $data['image_url'] ?>"/>
  			</a>
  		</td>
  		<td valign="top">
	  		<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr>
		  			<td><?php echo CHtml::link(CHtml::encode($data['title']), array('prod/detail','pid'=>$data['id']), array('target'=>'_blank'))?></td>
				</tr>
				<tr>
			  		<td rowspan="2"><?php echo CHtml::encode($data['description']); ?></td>
				</tr>
				<tr>
			  		<td height="22" class="t12b">&nbsp;</td>
		    	</tr>
		  	</table>
	  	</td>
	</tr>
</table>

</div>