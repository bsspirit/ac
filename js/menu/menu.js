var setting = {
	edit: {enable: true,showRemoveBtn: false,showRenameBtn: false},
	data: {simpleData: {enable: true}},
	callback: {	beforeDrag: beforeDrag,beforeDrop: beforeDrop}
};

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