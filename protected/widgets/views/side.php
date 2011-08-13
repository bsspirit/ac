<?php 
foreach($pages as $page){
	if($page == 'intro'){
		$this->render('box/intro');
	}
	
	if($page == 'contact'){
		$this->render('box/contact');
	}
}
?>


