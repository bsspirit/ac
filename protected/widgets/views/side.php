<?php 
foreach (array_keys($pages) as $page){
	
	if($page == 'contact'){
		$this->render('box/contact');
	}
		
	if($page =='friend'){
		$this->render('box/friend');
	}
	
	if($page =='intro'){
		$this->render('box/intro');
	}
	
	if($page =='news'){
		$this->render('box/news', array(
			'news'=>$pages[$page],
		));
	}
	
	if($page =='case'){
		$this->render('box/case', array(
			'case'=>$pages[$page],
		));
	}
	
	if($page =='prod'){
		$this->render('box/prod', array(
			'prod'=>$pages[$page],
		));
	}
}
?>


