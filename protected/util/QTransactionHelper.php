<?php
class QTransactionHelper extends QBaseServiceHelper
{
	public function onBeforePerform($event)
	{
		Yii::trace('begin transaction');
	}
	
	public function onAfterPerform($event)
	{
		Yii::trace('commit transaction');
	}
}