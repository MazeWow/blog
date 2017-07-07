<?php
interface Module {
	function execute();
}

class Person{
	public $name;
	function __construct($name){
		$this -> name = $name;
	}
}

class FtpModule implements Module {
	function setHost( $host ){
		print "Ftpmodule::setHost() : $host \n";
	}

	function setUser( $user ){
		print "FtpModule::setUser() : $user \n";
	}

	function execute(){
		// do something
	}
}

class PersonModule implements Module {
	function setPerson( Person $person){
		print "PersonModule::setPerson(): {$person -> name} \n";
	}

	function execute(){
		// do something
	}
}

class ModuleRunner {
	private $configData = [
		'PersonModule' => ['person'=>'bob'],
		'FtpModule' => ['host'=>'example.com','user'=>'anon']
	];

	private $modules = [];

	function init(){
		$interface = new ReflectionClass('Module');
		var_dump($interface);
		foreach ( $this -> configData as $modulename => $params ){
			$module_class = new ReflectionClass( $modulename );
			
			if( ! $module_class -> isSubclassOf($interface)){
				throw new Exception("Unkown module type : $modulename");
			}

			$module = $module_class -> newInstance();
			foreach( $module_class -> getMethods() as $method ) {
				$this -> handleMethod($module , $method , $params);
			}
			array_push($this -> modules,$module);
		}
	}

	function handleMethod(Module $module , ReflectionMethod $method,$params ){
		$name = $method -> getName();
		$args = $method -> getParameters();

		if(count($args) != 1 || substr($name,0,3) != 'set'){
			return false;
		}

		$property = strtolower(substr($name,3));

		if(!isset($params[$property])){
			return false;
		}

		$arg_class = $args[0] -> getClass();

		if(empty($arg_class)){
			$method -> invoke($module , $params[$property]);
		}else{
			$method -> invoke($module , $arg_class -> newInstance($params[$property]));
		}
	}
}

$test = new ModuleRunner();
$test -> init();












