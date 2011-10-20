<?php $basepath = Yii::app()->request->baseUrl;?>
<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/zTreeStyle.css" media="screen, projection" />
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.ztree.core-3.0.min.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.ztree.excheck-3.0.min.js"></script>
<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.ztree.exedit-3.0.min.js"></script>
<SCRIPT type="text/javascript">
		var setting = {
			edit: {
				enable: true,
				showRemoveBtn: false,
				showRenameBtn: false
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeDrag: beforeDrag,
				beforeDrop: beforeDrop
			}
		};

		var zNodes =[
			{ id:1, pId:0, name:"随意拖拽 父", open:true},
			{ id:11, pId:1, name:"随意拖拽 子 1"},
			{ id:12, pId:1, name:"随意拖拽 子 2", open:true},
			{ id:121, pId:12, name:"随意拖拽 孙 1"},
			{ id:122, pId:12, name:"随意拖拽 孙 2"},
			{ id:123, pId:12, name:"随意拖拽 孙 3"},
			{ id:13, pId:1, name:"禁止拖拽 子 1", open:true, drag:false},
			{ id:131, pId:13, name:"禁止拖拽 孙 1", drag:false},
			{ id:132, pId:13, name:"禁止拖拽 孙 2", drag:false},
			{ id:132, pId:13, name:"随意拖拽 孙 4"},
			{ id:2, pId:0, name:"随意拖拽 父 3", open:true},
			{ id:21, pId:2, name:"随意拖拽 子 3"},
			{ id:22, pId:2, name:"禁止拖拽到我身上", open:true, drop:false},
			{ id:221, pId:22, name:"随意拖拽 孙 5"},
			{ id:222, pId:22, name:"随意拖拽 孙 6"},
			{ id:223, pId:22, name:"随意拖拽 孙 7"},
			{ id:23, pId:2, name:"随意拖拽 子 4"}
		];

		function beforeDrag(treeId, treeNodes) {
			for (var i=0,l=treeNodes.length; i<l; i++) {
				if (treeNodes[i].drag === false) {
					return false;
				}
			}
			return true;
		}
		function beforeDrop(treeId, treeNodes, targetNode, moveType) {
			return targetNode ? targetNode.drop !== false : true;
		}
		
		function setCheck() {
			var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
			isCopy = true;
			isMove = true;
			prev = true;
			inner = true;
			next = true;
			zTree.setting.edit.drag.isCopy = isCopy;
			zTree.setting.edit.drag.isMove = isMove;
			showCode(1, ['setting.edit.drag.isCopy = ' + isCopy, 'setting.edit.drag.isMove = ' + isMove]);

			zTree.setting.edit.drag.prev = prev;
			zTree.setting.edit.drag.inner = inner;
			zTree.setting.edit.drag.next = next;
			showCode(2, ['setting.edit.drag.prev = ' + prev, 'setting.edit.drag.inner = ' + inner, 'setting.edit.drag.next = ' + next]);
		}
		function showCode(id, str) {
			var code = $("#code" + id);
			code.empty();
			for (var i=0, l=str.length; i<l; i++) {
				code.append("<li>"+str[i]+"</li>");
			}
		}
		
		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
			setCheck();
			$("#copy").bind("change", setCheck);
			$("#move").bind("change", setCheck);
			$("#prev").bind("change", setCheck);
			$("#inner").bind("change", setCheck);
			$("#next").bind("change", setCheck);
		});
	</SCRIPT>
<h1>分类管理</h1>

<div class="zTreeDemoBackground">
	<ul id="treeDemo" class="ztree"></ul>
</div>

<?php 
//foreach($tree->getData() as $node){
//	echo $node->pid . ' : ' . $node->sid.'<br/>';
//}
?>