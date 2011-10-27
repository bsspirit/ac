function popup_name(obj){
	var child1 = $(obj).parent().parent().children(':first-child').next();
	var catid = child1.text();
	var name = child1.next().text();
	
	var txt = '<form id="form-name" method="get" action="'+path+'/menu/upname">'
		txt+= '分类名称：<input type="text" name="name" value="'+name+'" />';
		txt+= '<input type="hidden" name="catid" value="'+catid+'"/>'
		txt+= '</form>';
	
	$.prompt(txt,{
		submit: function(v,m,f){
			if(v){
				$('#form-name').submit();
			}
			return true;
		},
		buttons: { '修改':true,'取消':false }
	});
}

function popup_move(obj){
	var child = $(obj).parent().parent().children(':first-child');
	var child1 = child.next();;
	var id = child.text();
	var catid = child1.text();
	var name = child1.next().text();
	var pname = child1.next().next().text();
	var pid = child1.next().next().next().text();
	
	$.getJSON(path+'/menu/menuList', function(data) {
	  	var txt = '<form id="form-move" method="get" action="'+path+'/menu/move">';
			txt+= '分类名称：'+name+'<br/>';
			if(pid==0){
				txt+= '父节点：'+pname+'(不能移动)<br/>';
			} else {
				txt+= '父节点：';
				txt+='<select name="pid">';
				
				$.each(data, function(key, val) {
				  	eval('var obj ='+ val);
			    	txt+='<option value="'+obj.id+'" '+(obj.id==pid?"selected":"")+'>'+obj.name+'</option>';
			  	});
				txt+='</select><br/>';
			}
			txt+= '<input type="hidden" name="id" value="'+id+'"/>'
			txt+= '</form>';
			
		$.prompt(txt,{
			submit: function(v,m,f){
				if(v && f['pid']!=null){
					if(f['pid']==catid){
						alert('不能设置自己为父节点！');
						return false;
					} 
					
					$('#form-move').submit();
				}
				return true;
			},
			buttons: { '移动':true,'取消':false }
		});
	});
}