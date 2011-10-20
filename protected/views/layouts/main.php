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
	
	<script type="text/javascript" src="<?php echo $basepath ?>/js/jquery.js"></script>
	<!--<script type="text/javascript" src="<?php echo $basepath ?>/js/easySlider1.7.js"></script>-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="header1">
	<div class="header-content">
		<div class="logo">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
		</div>
		<div class="logo-link">
			[<a href="#" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.ac-999.com');">设为首页</a>] 
			[<a href="#" onclick="window.external.AddFavorite(location.href,document.title);">加入收藏</a>]
			<?php 
			if(!Yii::app()->user->isGuest){
				echo '['.CHtml::link('管理员界面', array('/admin')).']';
			}
			?>
		</div>
	</div>
</div>
	
<div class="container">
	<div id="header2">
		<div class="banner"></div>
		<div class="nav">
			<table width="968" height="51" cellspacing="0" cellpadding="0" border="0" align="center">
				<tr>
					<td width="19"><img width="22" height="54" src="<?php echo Yii::app()->request->baseUrl; ?>/images/nav1.jpg"/></td>
					<td background="<?php echo Yii::app()->request->baseUrl; ?>/images/nav2.jpg">
						<table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tr>
						        <td align="center"><?php echo CHtml::link('首  页', array('default/index'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('公司简介', array('site/about'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('产品介绍', array('prod/intro'))?></td>
						        <td align="center">|</td>
								<td align="center"><?php echo CHtml::link('节能环保', array('prod/saving'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('施工安装', array('prod/setup'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('维修保养', array('prod/maintain'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('工程案例', array('prod/case'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('行业新闻', array('prod/news'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('招聘信息', array('site/job'))?></td>
						        <td align="center">|</td>
						        <td align="center"><?php echo CHtml::link('联系我们', array('site/contact'))?></td>
							</tr>
						</table>
					</td>
					<td width="19"><img width="24" height="54" src="<?php echo Yii::app()->request->baseUrl; ?>/images/nav3.jpg"/></td>
				</tr>
			</table>
		</div>
	</div>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		<div class="nav">
			<?php echo CHtml::link('公司简介', array('site/about'))?>|
			<?php echo CHtml::link('产品介绍', array('prod/intro'))?>|
			<?php echo CHtml::link('北京开利空调施工安装', array('prod/setup'))?>|
			<?php echo CHtml::link('北京开利空调保养维修', array('prod/maintain'))?>|
			<?php echo CHtml::link('北京开利空调工程案例', array('prod/case'))?>|
			<?php echo CHtml::link('北京开利空调行业新闻', array('prod/news'))?>|
			<?php echo CHtml::link('招聘信息', array('site/job'))?>|
			<?php echo CHtml::link('联系我们', array('site/contact'))?>
			<?php 
				echo '|';
				if(Yii::app()->user->isGuest){
					echo CHtml::link('管理员登陆', array('/site/login'));
				} else {
					echo CHtml::link('退出登陆', array('/site/logout'));
				}
			?>
		</div>
		<div class="footer-content">
			<div class="logo">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.png"/>
			</div>
			<div class="copyright">
			  	北京奥诚兴业科技发展有限公司 版权所有 京ICP备XXXXXX号<br/>
				电话：010-67186799 67187099    Email：ac_carrier@sina.com<br/>
			</div>
		</div>
	</div>

</div><!-- page -->

</body>
</html>