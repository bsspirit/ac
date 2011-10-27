var cid = $('#catelog_list').attr('select');
var isnull = $('#catelog_list').attr('isnull');


$.getJSON(path+'/menu/menuList/',{cid:cid}, function(data) {
  	var	txt= '分类名称：&nbsp;&nbsp;';
	txt+='<select name="Prod[catid]">';
	txt+=isnull?'<option value="">--所有分类--</option>':'';
	$.each(data, function(key, val) {
	  	eval('var obj ='+ val);
    	txt+='<option value="'+obj.id+'" ';
    	txt+=obj.selected?'selected':'';
    	txt+=' >'+obj.name+'</option>';
  	});
	txt+='</select>';

	$('#catelog_list').html(txt);
});