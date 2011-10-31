$(document).ready(function(){
	var ele = $('#menuChildren');
	var cid = ele.attr('cid');
	$.getJSON(path+'/menu/menuChildren/cid/'+cid, function(data) {
		if(data.length<1){
			ele.parent().parent().css('display', 'none');
		} else{
			var arr = [];
		  	$.each(data, function(key, val) {
			  	eval('var obj ='+ val);
			  	if(obj.pId==cid){
			  		arr[obj.id] = '<a href="'+path+obj.path+'">'+obj.name+'</a><br/>';
			  	} else {
			  		arr[obj.pId] += '&nbsp;--&nbsp;<a href="'+path+obj.path+'">'+obj.name+'</a><br/>';
			  	}
		  	});
		  	
		  	var txt = '';
		  	for(var ar in arr){
		  		txt += arr[ar];
		  	}
		  	
		  	ele.html(txt);
		}
	});
});