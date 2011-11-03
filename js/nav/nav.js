$(document).ready(function(){
	$.getJSON(path + '/menu/menuNav/', {}, function(data) {
		var txt = '<ul class="topnav">';
		var nav1=[];
		$.each(data, function(key, val) {
			eval('var obj =' + val);
			if(obj.pId==0){
				switch(obj.id){
				case 7:	nav1[0]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 8:	nav1[1]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 1:	nav1[2]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 2:	nav1[3]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 3:	nav1[4]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 4:	nav1[5]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 5:	nav1[6]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 6:	nav1[7]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 9:	nav1[8]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				case 10:nav1[9]='<li><a href="'+path+obj.path+'">'+obj.name+'</a><ul class="subnav">';break;
				}
			} else {
				switch(obj.pId){
				case 7:nav1[0]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 8:nav1[1]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 1:nav1[2]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 2:nav1[3]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 3:nav1[4]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 4:nav1[5]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 5:nav1[6]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 6:nav1[7]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 9:nav1[8]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				case 10:nav1[9]+='<li><a href="'+path+obj.path+'">'+obj.name+'</a></li>';break;
				}
			}
		});
		for (var i=0;i<10;i++){
			txt += nav1[i] + '</ul></li>';
		}
		txt += '</ul>';
		$('#header-nav').html(txt);
		
		$("ul.topnav li a").hover(function() { 
			$(this).parent().find("ul.subnav").slideDown('fast').show(); 
			$(this).parent().hover(function() {
			}, function(){	
				$(this).parent().find("ul.subnav").slideUp('slow'); 
			});
			}).hover(function() { 
				$(this).addClass("subhover"); 
			}, function(){	
				$(this).removeClass("subhover"); 
		});
	});
})
	


