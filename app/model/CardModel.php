<?php

namespace App\Model;
use Nette\Utils\Image;
use Tracy\Debugger;

class CardModel {
    
    protected $database;
    private $TableName = 'card';
    private $UploadThumbPath = '/images/cards/thumbs/';
    private $UploadPath = '/images/cards/';
    private $imageName;
    private $date;
    private $extension;
    
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
    
    /** zpracuje */
    public function novaVizitka($values){
	$images = $values->img;
	try{
	    $this->uprav($images, $values);
	    $this->ulozDoDB($values, $this->imageName);
	} catch (Exception $ex) {

	}
    }
    /** upravi a presune vizitku do slozky */
    private function uprav($images,$values){
	    foreach($images as $image){
		if($image->isImage() AND $image->isOk())
		{
		    $extension = pathinfo($image->getSanitizedName(), PATHINFO_EXTENSION);
		    if(!$values->surname){
			$imageName = pathinfo($image->getSanitizedName(), PATHINFO_FILENAME);
		    }else{
			$imageName = $values->name . '.' .$extension; 
		    }
		    /** @TODO vyresit kolize , presun obrazku */    
		    $img = $image->toImage();
		    $img->resize(700,400, Image::STRETCH|Image::SHRINK_ONLY);
		    $img->save(WWW_DIR . $this->UploadThumbPath . $imageName.'.'. $extension);
		    $img->save(WWW_DIR . $this->UploadPath . $imageName . '.' . $extension);   
		}
		$this->imageName = $imageName;
		$this->extension = $extension;
	    }
	    /** zpracovani datumu */
	    if($values->date == Null){
		$date = date('Y-m-d');
	    }else{
		$date = $values->date;
	    }
	    $this->date = $date;
    }
    
    /** insert do db */
    private function ulozDoDB($values,$imageName){
	$query = $this->database->table($this->TableName)->insert([
		    'name'=> $values->name,
		    'surname'=> $imageName,
		    'workplace'=> $values->workplace,
		    'project'=>$values->project,
		    'www'=>$values->www,
		    'date'=>  $this->date,
		    'note'=>$values->note,
		    'img'=>$this->UploadPath . $imageName.'.'.$this->extension,
		    'thumb_img'=> $this->UploadThumbPath . $imageName.'.'.$this->extension,
		]);
	return $query;
	
    }
     
    /** upravi(zmensi/zvetsi vizitku) a presune do slozky */
    private function edit($images){
	
	try{
	    foreach($images as $image){
		if($image->isImage() AND $image->isOk())
		{
		    $extension = pathinfo($image->getSanitizedName(), PATHINFO_EXTENSION);
		    $imageName = $values->surname;
		    
		    /** @TODO vyresit kolize , presun obrazku */    
		    $img = $image->toImage();
		    $img->resize(700,400, Image::STRETCH|Image::SHRINK_ONLY);
		    $img->save(WWW_DIR . $this->UploadThumbPath . $imageName.'.'. $extension);
		    $img->save(WWW_DIR . $this->UploadPath . $imageName . '.' . $extension);   
		}
	    }
	} catch (Exception $ex) {
	    $this->presenter->addError($ex->getMessage());
	}	    
	
	/** zpracovani datumu */
	if($values->date == Null){
	    $date = date('Y-m-d');
	}else{
	    $date = $values->date;
	}
	
    }
    
    /** @TODO rozdelit zpracovani obrazku a insert do dtb **/
    public function insert($values){
	
	try{
	    $cards = $values->img;
	    foreach($cards as $card){
		if($card->isImage() AND $card->isOk())
		{
		    $extension = pathinfo($card->getSanitizedName(), PATHINFO_EXTENSION);
		    
		    if(!$values->surname){
			$cardName = pathinfo($image->getSanitizedName(), PATHINFO_FILENAME);
		    }else{
			$cardName = $values->surname; 
		    }
		    
		    /** @TODO vyresit kolize nazvu, presun obrazku */    
		    $image = $card->toImage();
		    $image->resize(700,400, Image::SHRINK_ONLY);
		    $image->save(WWW_DIR . $this->UploadPath . $cardName . '.' . $extension);  
		    
		    $thumb = $card->toImage();
		    $thumb->resize(400,NULL, iMAGE::SHRINK_ONLY);
		    $thumb->save(WWW_DIR .$this->UploadThumbPath . $cardName.'.'.$extension);
			    
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
		    'date'=>$date,
		    'note'=>$values->note,
		    'img'=>$this->UploadPath . $cardName.'.'.$extension,
		    'thumb_img'=> $this->UploadThumbPath . $cardName.'.'.$extension,
		]);
	
	    }
	} catch (Exception $ex) {
	    $form->addError($ex->getMessage());
	}
	/** return aby slo presmerovani pri odeslani primo na ukladanou vizitku */
	return $query;
    }
    
    public function update($values){	
	
	$this->database->table($this->TableName)->update($values);
	
    }
    
    public function delete($id){
	
	$row = $this->getId($id);
	//$this->database->query('DELETE FROM '.$this->TableName.' WHERE id= '.$id);
	if($row){
	    unlink(WWW_DIR. $row->img);
	    unlink(WWW_DIR.$row->thumb_img);
	    $this->database->query('DELETE FROM '.$this->TableName.' WHERE id= '.$id);	    
	}
	/** @TODO if $image unlink $image */
	
	
    }
    
    
    
}
