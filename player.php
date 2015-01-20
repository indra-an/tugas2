<?php
  class Player {
    //object variable of class
    protected $name;
    protected $blood;
    protected $manna;

    //constructor
    function __construct(){
		$this->blood = 100;
		$this->manna = 40;
	}
    
    //properties function here
    function set_player($name,$blood=null,$manna=null) {
		$this->name = $name;
		$data['name'] = $this->name;
		
		if($blood==null){
			$data['blood'] = $this->blood;
		}else{
			$data['blood'] = $blood;
		}
		
		if($manna==null){
			$data['manna'] = $this->manna;
		}else{
			$data['manna'] = $manna;
		}
		
		return $data;
    }
	
  }
  
?>