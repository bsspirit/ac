<?php $basepath = Yii::app()->request->baseUrl;?>
<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/zTreeStyle.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/impromptu.css" media="screen, projection" />
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.ztree.core-3.0.min.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.ztree.excheck-3.0.min.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.ztree.exedit-3.0.min.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery-impromptu.3.2.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/my/menu.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/my/popup.js"></script>

<h1>分类管理</h1>

<div class="tree l">
	<ul id="treeDemo" class="ztree"></ul>
</div>

<div class="treeside l">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prod-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		array(
			'header'=>'分类ID',
			'value'=>'$data->sid',
		),
		array(
			'name'=>'son',
			'header'=>'分类名 ',
			'value'=>'empty($data->son->name)?"未分类":$data->son->name',
		),
		array(
			'name'=>'son',
			'header'=>'父结点 ',
			'value'=>'$data->pid==0?"一级分类":(empty($data->parent->name)?"未分类":$data->parent->name)',
		),
		array(
			'header'=>'父结点ID',
			'value'=>'$data->pid',
		),
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'buttons'=>array(
			 	'name'=>array(
		           	'label'=>'改名',	
		           	'imageUrl'=>false,
		      		'options'=>array('onclick'=>'popup_name(this)'),
	            ),
                'move'=>array(
		           	'label'=>'移动',	
		           	'imageUrl'=>false,
	            	'options'=>array('onclick'=>'popup_move(this)'),
	            ),
             ),
        	'template' =>'{name} {move}',
            'htmlOptions'=>array(
		        'style'=>'width:100px;'
		    ),
	    )
	),
)); ?>
</div>
