<?php

namespace App\Model;
use Nette\Utils\Image;
use Tracy\Debugger;

class CardModel {
    
    protected $database;
    private $TableName = 'card';
    private $UploadThumbPath = '/images/cards/thumbs/';
    private $UploadPath = '/images/cards/';
    
    
    public function __construct(\Nette\Database\Context $database) {
	$this->database = $database;
    }
    
    ///** @method var getAll() Get all rows from table card */
    public function getAll(){
	return $this->database->table($this->TableName);
    }
    
    
    public function getId($id){
	return $this->database->table($this->TableName)->get($id);
    }
    /** @return blah bla */
    public function search($keywords){
	return $this->database->table($this->TableName)->where('surname LIKE ?', '%'.$keywords.'%')->fetch();
    }
    
    public function zapis($keywords){
	return $this->database->table('search')->insert([
	    'keywords' => $keywords,
	   
	]);
    }
    
    public function test(){
	return $this->database->table('search');
    }
    
    /** @TODO rozdelit zpracovani obrazku a insert do dtb **/
    public function insert($values){
	
	try{
	    $cards = $values->path;
	    
	    foreach($cards as $card){
		if($card->isImage() AND $card->isOk())
		{
		    $extension = pathinfo($card->getSanitizedName(), PATHINFO_EXTENSION);
		    $cardName = $values->surname;
		    
		    /** @TODO vyresit kolize , presun obrazku */    
		    $image = $card->toImage();
		    $image->resize(700,400, Image::STRETCH|Image::SHRINK_ONLY);
		    $image->save(WWW_DIR . $this->UploadThumbPath . $cardName.'.'. $extension);
		    $image->save(WWW_DIR . $this->UploadPath . $cardName . '.' . $extension);   
		}
	    }
	} catch (Exception $ex) {
	    $form->addError($ex->getMessage());
	}	    
	/** zpracovani datumu */
	if($values->date == Null){
	    $date = date('Y-m-d');
	}else{
	    $date = $values->date;
	}
	
	
	$query = $this->database->table($this->TableName)->insert([
		'name'=> $values->name,
		'surname'=> $cardName,
		'workplace'=> $values->workplace,
		'project'=>$values->project,
		'www'=>$values->www,
		'photo'=>'',
		'date'=>$date,
		'note'=>$values->note,
		'path'=>'images/cards/'.$cardName.'.'.$extension,
		'thumb_path'=> 'images/cards/thumbs/'.$cardName.'.'.$extension,
	    ]);
	/** return aby slo presmerovani pri odeslani primo na ukladanou vizitku */
	return $query;
    }
    
    public function update($values){	
	
	
	
	
	
    }
    
    public function delete($id){
	
	$row = $this->getId($id);
	$this->database->query('DELETE FROM '.$this->TableName.' WHERE id= '.$id);
	/*if($row){
	    unlink(WWW_DIR.$this->UploadPath . $row->path);
	    unlink(WWW_DIR.$this->UploadThumbPath . $row->thumb_path);
	    $this->database->query('DELETE FROM '.$this->TableName.' WHERE id= '.$id);
	    
	}*/
	
	
	
    }
    
    
    
}
