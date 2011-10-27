$.getJSON(path+'/menu/menuList', function(data) {
  	var	txt= '分类名称：&nbsp;&nbsp;';
	txt+='<select name="Prod[catid]">';
	$.each(data, function(key, val) {
	  	eval('var obj ='+ val);
    	txt+='<option value="'+obj.id+'" >'+obj.name+'</option>';
  	});
	txt+='</select>';

	$('#catelog_list').html(txt);
});