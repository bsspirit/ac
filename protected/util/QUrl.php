<?php
class QUrl{
	static public function encode($model,$id)
	{
		$user_id = Yii::app()->user->id;
		$encode_id = md5($id.$user_id);

		return "/entity/$model/eid/$encode_id/id/$id";
	}

	static public function decode()
	{
		$eid = Yii::app()->request->getParam('eid');
		$user_id = Yii::app()->user->id;
		$id = Yii::app()->request->getParam('id');
		$encode_id = md5($id.$user_id);
		
		if ($encode_id == $eid)
			return $id;
		else
			return null;
	}
}