<?php 
class picWidget extends CWidget
{    
	public $dataProvider;
	public $rows;
	public $total;
	public $size;
	
    public function init()
    {
    	//当视图中执行$this->beginWidget()时候会执行这个方法
        //可以在这里进行查询数据操作
    	$this->rows = $this->dataProvider->getData();
    	$this->total = 40;//$this->dataProvider->
    	$this->size = 10;
    }
 
    public function run()
    {
        //当视图中执行$this->endWidget()的时候会执行这个方法
        //可以在这里进行渲染试图的操作，注意这里提到的视图是widget的视图
        //注意widget的视图是放在跟widget同级的views目录下面，例如下面的视图会放置在
        //protected/widgets/views/test.php
        $this->render('pic', array(
            'rows'=>$this->rows,
            'total'=>$this->total,
            'size'=>$this->size,
        ));
    }
}
?>