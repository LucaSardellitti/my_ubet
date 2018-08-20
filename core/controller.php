<?php
class Controller{
	protected $request = array();

	public function __construct (){
		if(isset($_POST)){
			$this->request = $_POST;
		}
	}

	public function render($view, $layout = 'default' , $scope = [], $info = [] ){
		extract($scope);
		ob_start();
		$success = include(ROOT."views/".lcfirst(str_replace('Controller', '', get_class($this))).'/'.$view.'.php');
		// $success = include(ROOT."views/". $view.'.php')
		$content_for_layout = ob_get_clean();
		if(!$success){
			require (ROOT.'404.php');
		}
		else{
			require(ROOT.'views/layouts/'.$layout.'.php');
		}
	}

	public function loadModel($name){
		require_once(ROOT.'models/'.$name.'.model.php');
		$model = ucfirst($name).'Model';
		return $this->$name = new $model();
	}
}