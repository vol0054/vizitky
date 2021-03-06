<?php

namespace App\Model;
use Nette\Utils\Image;
use Tracy\Debugger;

class CardModel extends BaseModel{
    
    protected $database;
    /** nazev tabulky v dtb */ 
    private $TableName = 'card';
    private $UploadThumbPath = '/images/cards/thumbs/';
    private $UploadPath = '/images/cards/';
    private $fotoPath = '/images/photos/';
    public $fotoName = '';
    public $fotoExtension = '';
    public $query;
        
    /** vypise vsechny zaznamy z tabulky TableName */
    public function getAll(){
		return $this->database->table($this->TableName)->order('id DESC');
    }
    
    /** ziska id zaznamu v tabulce */
    public function getId($id){
		return $this->database->table($this->TableName)->get($id);
    }
    
    /** vyhleda osobu podle prijmeni nebo podle institutu */
    public function search($keywords){
		return $this->database->query("SELECT * FROM ".$this->TableName." WHERE surname LIKE '%".$keywords."%' OR name LIKE '%".$keywords."%' OR institution  LIKE '%".$keywords."%'");
    }
    
    /** @TODO rozdelit zpracovani obrazku a insert do dtb **/
    public function insert($values)
    {
	    $cards = $values->img;
		foreach($cards as $card)
		{
		    if($card->isImage() AND $card->isOk())
		    {
			$extension = pathinfo($card->getSanitizedName(), PATHINFO_EXTENSION);
			if($values->surname)
			{
			   $cardName = $values->surname;  
			}else{
			    $cardName = pathinfo($card->getSanitizedName(), PATHINFO_FILENAME);
			}		    
			$image = $card->toImage();
			//$image->resize(700,400, Image::SHRINK_ONLY);
			$image->save(WWW_DIR . $this->UploadPath . $cardName.'.'.$extension);  

			$thumb = $card->toImage();
			$thumb->resize(700,400, Image::EXACT);
			$thumb->save(WWW_DIR .$this->UploadThumbPath . $cardName.'.'.$extension);

		    }
		
	    
		    /** zpracovani fotografie osoby */
		    $foto = $values->foto;
		    
			if($foto->isImage() AND $foto->isOk()){
			    $fotoExtension = pathinfo($foto->getSanitizedName(), PATHINFO_EXTENSION);
			    if(!$values->surname)
			    {
				$fotoName = pathinfo($foto->getSanitizedName(), PATHINFO_FILENAME);
			    }else{
				$fotoName = $values->surname; 
			    }		    
			    $image = $foto->toImage();
			    $image->resize(200,200, Image::EXACT);
			    $image->save(WWW_DIR . $this->fotoPath . $fotoName.'.'.$fotoExtension);

			}else{
			    $fotoName = NULL;
			    $fotoExtension = NULL;
			}
		    


		/** zpracovani datumu */
		if($values->date == Null){
		    $date = date('Y-m-d');
		}else{
		    $date = $values->date;
		}
		/** insert do dtb */
		$query = $this->database->table($this->TableName)->insert([
			'name'=> $values->name,
			'surname'=> $cardName,
			'institution'=> $values->institution,
			'project'=>$values->project,
			'www'=>$values->www,
			'date'=>$date,
			'note'=>$values->note,
			'img'=>$this->UploadPath . $cardName.'.'.$extension,
			'thumb_img'=> $this->UploadThumbPath . $cardName.'.'.$extension,
			'foto' => $this->fotoPath.$fotoName.'.'.$fotoExtension,
		    ]);
		}
		/** return aby slo presmerovani pri odeslani primo na ukladanou vizitku */
		return $query;
    }
    
    public function delete($id){	
		$row = $this->getId($id);
		//$this->database->query('DELETE FROM '.$this->TableName.' WHERE id= '.$id);
		if($row){
			unlink(WWW_DIR. $row->img);
			unlink(WWW_DIR.$row->thumb_img);
			$this->database->query('DELETE FROM '.$this->TableName.' WHERE id= '.$id);	    
		}
    }  
    
    
    
    ####################################################################################################
    /** in progress - rozdeleni funkce insert zatim nefunkcni */
    public function novaVizitka($values){
		$images = $values->img;
		try{
			$this->uprav($images, $values);
			$this->ulozDoDB($values);
		} catch (Exception $ex) {

		}
		return $this->query;
    }
    
    /** upravi a presune vizitku nebo foto do slozky / */
    private function uprav($images,$values)
	{
	    foreach($images as $image){
		if($image->isImage() AND $image->isOk())
		{
		    $extension = pathinfo($image->getSanitizedName(), PATHINFO_EXTENSION);
		    if(!$values->surname){
			$imageName = pathinfo($image->getSanitizedName(), PATHINFO_FILENAME);
		    }else{
			$imageName = $values->name . '.' .$extension; 
		    }
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
    private function ulozDoDB($values){
	$query = $this->database->table($this->TableName)->insert([
		    'name'=> $values->name,
		    'surname'=> $this->imageName,
		    'institution'=> $values->institution,
		    'project'=>$values->project,
		    'www'=>$values->www,
		    'date'=>  $this->date,
		    'note'=>$values->note,
		    'img'=>$this->UploadPath . $this->imageName.'.'.$this->extension,
		    'thumb_img'=> $this->UploadThumbPath . $this->imageName.'.'.$this->extension,
		]);
	$this->query = $query;
	
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
}
