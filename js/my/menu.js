var setting = {
	edit: {enable: true,showRemoveBtn: false,showRenameBtn: false},
	data: {simpleData: {enable: true}},
	callback: {	beforeDrag: beforeDrag,beforeDrop: beforeDrop}
};

//var zNodes =[
//	{ id:1, pId:0, name:"随意拖拽 父"},
//	{ id:11, pId:1, name:"随意拖拽 子 1"},
//	{ id:12, pId:1, name:"随意拖拽 子 2"},
//	{ id:121, pId:12, name:"随意拖拽 孙 1"},
//	{ id:122, pId:12, name:"随意拖拽 孙 2"},
//	{ id:123, pId:12, name:"随意拖拽 孙 3"},
//	{ id:13, pId:1, name:"禁止拖拽 子 1"},
//	{ id:131, pId:13, name:"禁止拖拽 孙 1"},
//	{ id:132, pId:13, name:"禁止拖拽 孙 2"},
//	{ id:132, pId:13, name:"随意拖拽 孙 4"},
//	{ id:2, pId:0, name:"随意拖拽 父 3"},
//	{ id:21, pId:2, name:"随意拖拽 子 3"},
//	{ id:22, pId:2, name:"禁止拖拽到我身上"},
//	{ id:221, pId:22, name:"随意拖拽 孙 5"},
//	{ id:222, pId:22, name:"随意拖拽 孙 6"},
//	{ id:223, pId:22, name:"随意拖拽 孙 7"},
//	{ id:23, pId:2, name:"随意拖拽 子 4"}
//];

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
	var zTree = $.fn.zTree.getZTreeObj("treeDemo");
	zTree.setting.edit.drag.isCopy = true;
	zTree.setting.edit.drag.isMove = true;
	zTree.setting.edit.drag.prev = true;
	zTree.setting.edit.drag.inner = true;
	zTree.setting.edit.drag.next = true;
}

$(document).ready(function(){
	var path = $('body').attr('path')+"/index.php";
	$.getJSON(path+'/menu/menuTree', function(data) {
		var items = [];
	  	$.each(data, function(key, val) {
		  	eval('var obj ='+ val);
	    	items.push(obj);
	  	});
		
		$.fn.zTree.init($("#treeDemo"), setting, items);
		setCheck();
		$("#copy").bind("change", setCheck);
		$("#move").bind("change", setCheck);
		$("#prev").bind("change", setCheck);
		$("#inner").bind("change", setCheck);
		$("#next").bind("change", setCheck);
	});
});