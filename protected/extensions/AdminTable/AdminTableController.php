<?php

class AdminTableController extends CController
{
	var $data = array(
		"partialTop" => array(),
		"partialBottom" => array()
	);
	var $viewTable = "application.extensions.AdminTable.views.AdminTable";
	protected function beforeAction()
	{
		if(Yii::app()->user->isGuest)
		{
			$this->redirect("site/login");
			return false;
		}
		return true;
	}
	protected function tableEdit($modelClass,$table,$options=array())
	{
		$defaultOptions = array(
			"errorMessage" => "Error occurs",
			"primary" => "id",
			"selectAppend" => ""
		);
		$options = array_merge($defaultOptions,$options);
		$object = $modelClass::model()->find($options["primary"]." = ".$this->input_post("id"). " ".$options["selectAppend"]);
		if(!$object)
		{
			$this->returnError($errorMessage);
			return;
		}
		$editable = $table["actions"]["_edit"];
		foreach($editable as $column)
		{
			$val = $this->input_post($column);
			if($val===false && $table["fields"][$column]["type"]=="_checkbox")
			{
				$val = 0;
			}
			$object->$column = $val;
		}
		if(!$object->save(true,$editable))
		{
			$this->returnError($options["errorMessage"],array(
				"errors" => $object->getErrors()
			));
		}
		else
		{
			$this->returnSuccess();
		}
	}
	protected function tableDelete($modelClass,$options=array())
	{
		$defaultOptions = array(
			"errorMessage" => "Error occurs",
			"primary" => "id",
			"selectAppend" => "",
			"delete" => false
		);
		$options = array_merge($defaultOptions,$options);
		$object = $modelClass::model()->find($options["primary"]." = ".$this->input_post("id"). " ".$options["selectAppend"]);
		if(!$object)
		{
			$this->returnError();
			return;
		}
		$result;
		if($options["delete"])
		{
			$result = $object->delete();
		}	
		else
		{
			$object->is_active = 0;
			$result = $object->save(true,array("is_active"));
		}
		if(!$result)
		{
			$this->returnError($options["errorMessage"],array(
				"errors" => $object->getErrors()
			));
		}
		else
		{
			$this->returnSuccess();
		}
	}
	protected function tableOrder($table)
	{
		$orders = $this->input_post("orders");
		if(!$orders)
			return;
		$whenSql = "";
		foreach($orders as $order)
		{
			$whenSql .= "WHEN ".$order["id"]." THEN '".$order["index"]."'";
		}
		$sql = "UPDATE ".$table." SET order_index = CASE id ".$whenSql." END ";
		Yii::app()->db->createCommand($sql)->execute();
	}
	protected function renderView($view)
	{
		$this->render($view,$this->data);
	}
	protected function renderViewTable()
	{
		$this->renderView($this->viewTable);
	}
	protected function returnJSON($array)
	{
		echo CJSON::encode($array);
	}
	protected function returnSuccess($data=array(),$message="Ok")
	{
		$this->returnJSON(array(
			"success" => 1,
			"message" => $message,
			"data" => $data
		));
	}
	protected function returnError($message="Error occurs",$data=array())
	{
		$this->returnJSON(array(
			"success" => 0,
			"message" => $message,
			"data" => $data
		));	
	}
	protected function isPost($postVar=null)
	{
		$return = Yii::app()->getRequest()->getIsPostRequest() && isset($_POST["do"]);
		if($postVar!=null)
		{
			if(is_array($postVar))
			{
				foreach($postVar as $var)
				{
					$return = $return && isset($_POST[$var]);		
				}
			}
			else
			{
				$return = $return && isset($_POST[$postVar]);
			}
		}
		return $return;
	}
	protected function sqlFromRequest($arr=array())
	{
		$arr = array_merge(array(
			"selectSqlAppend" => "",
			"conditionSqlAppend" => "",
			"search" => "",
			"with" => null,
			"join" => null
		),$arr);
		// order, page, per_page, search, search_advanced
		$order = $this->input_get_post("order","id desc");
		$page = intval($this->input_get_post("page",0));
		$per_page = intval($this->input_get_post("per_page",10));
		$search = trim($this->input_get_post("search",""));
		$search_advanced = $this->input_get_post("search_advanced",0);
		//
		/*$this->db["order"] = $order;
		$this->db["page"] = $page;
		$this->db["per_page"] = $per_page;
		$this->db["search"] = $search;
		$this->db["search_advanced"] = $search_advanced;*/
		//
		$criteria=new CDbCriteria();
		$criteria->together = true;
		$criteria->select .= $arr["selectSqlAppend"];
		$criteria->condition = "1";
		if(!$search_advanced && $search!="" && $arr["search"]!="")
		{
			$searchAttr = explode(",",$arr["search"]);
			$criteria->condition .= " and (";
			foreach($searchAttr as $i => $attr)
			{
				if($i > 0)
					$criteria->condition .= " or ";
				$criteria->condition .= $attr." like '%".$search."%'";
			}
			$criteria->condition .= " )";
		}
		if($search_advanced)
		{
			foreach($search_advanced as $attr => $val)
			{
				$criteria->condition .= " and ".$attr." like '%".$val."%'";
			}
		}
		$criteria->condition .= " " . $arr["conditionSqlAppend"];
		$criteria->order = $order;
		$criteria->limit = $per_page;
		$criteria->offset = ($page-1)*$per_page;//print_r($criteria);die();
		if($arr["with"])
		{
			$criteria = $arr["with"];
		}
		if($arr["join"])
		{
			$criteria->join = $arr["join"];	
		}
		return $criteria;
	}
	protected function input_get($name,$default=false)
	{
		return $this->input($name,"get",$default);
	}
	protected function input_post($name,$default=false)
	{
		return $this->input($name,"post",$default);
	}
	protected function input_get_post($name,$default=false)
	{
		return $this->input($name,"get_post",$default);
	}
	protected function input($name,$type="get_post",$default=false)
	{
		switch($type)
		{
			case "get":
				return isset($_GET[$name]) ? $_GET[$name] : $default;
				break;
			case "post":
				return isset($_POST[$name]) ? $_POST[$name] : $default;
				break;
			case "get_post":
				return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $default);
				break;
		}
	}
}