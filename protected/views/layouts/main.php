<?php $basepath = Yii::app()->request->baseUrl;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=zh_CN lang="zh_CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="zh_CN" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath ?>/js/nav/latest.css" />
	<link rel="shortcut icon" href="<?php echo $basepath ?>/favicon.ico" />
	
	<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $basepath ?>/js/nav/jquery-latest.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body path="<?php echo $basepath?>">
<script type="text/javascript" src="<?php echo $basepath ?>/js/main.js"></script>
<div id="header1">
	<div class="header-content">
		<div class="logo">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
		</div>
		<div class="logo-link">
			[<a href="#" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.ac-999.com');">设为首页</a>] 
			[<a href="#" onclick="window.external.AddFavorite(location.href,document.title);">加入收藏</a>]
			<?php 
				if(Yii::app()->user->isGuest){
					echo '['.CHtml::link('登陆', array('/site/login')).']';
				} else {
					echo '['.CHtml::link('管理员', array('/admin')).'|'.CHtml::link('退出', array('/site/logout')).']';
				} 
			?>
		</div>
	</div>
</div>
	
<div class="container">
	<div id="header2">
		<div class="banner"></div>
		<div id="header-nav">
			<ul class="topnav">
				<li><a href="">首 页</a></li>
				<li><a href="">公司简介</a></li>
				<li><a href="">产品介绍</a></li>
				<li><a href="">节能环保</a></li>
				<li><a href="">施工安装</a></li>
				<li><a href="">保养维修</a></li>
				<li><a href="">工程案例</a></li>
				<li><a href="">行业新闻</a></li>
				<li><a href="">招聘信息</a></li>
				<li><a href="">联系我们</a></li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo $basepath ?>/js/nav/nav.js"></script>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		<div class="footer-content">
			<div class="logo">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.png"/>
			</div>
			<div class="copyright">
			  	北京奥诚兴业科技发展有限公司 版权所有 京ICP备07057890号<br/>
				电话：010-67186799&nbsp;&nbsp;67187099&nbsp;&nbsp;&nbsp;&nbsp;Email:ac_carrier@sina.com<br/>
			</div>
			<div class="link">
				<script type="text/javascript">
				var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
				document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F4e6b47b298cac1b0c8dd48673d00af0f' type='text/javascript'%3E%3C/script%3E"));
				</script>
			</div>
		</div>
	</div>

</div>
</body>
</html>