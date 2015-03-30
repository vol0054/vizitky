<?php

namespace App\Model;

abstract class BaseModel extends \Nette\Object{
    
    protected $database;
    protected $tableName;
    
    public function __construct(\Nette\Database\Context $database) {
	$this->database = $database;
	
	
    }
    
    public function findAll(){
	
	
    }
}
