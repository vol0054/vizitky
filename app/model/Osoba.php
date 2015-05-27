<?php

namespace App\Model;
use Nette\Utils\Image;


class Osoba {
    
    public $jmeno;
    public $prijmeni;
    public $www;
    public $institut;
    public $datumSetkani;
    public $projekt;
    public $poznamka;
    public $vizitka;
    public $foto;

    public function __construct(\Nette\Database\Context $database) {
	$this->database = $database;
    }
    
    public function novaOsoba($hodnoty)
    {
	$obrazky = $hodnoty->img;
	try{
	    $this->upravObrazky($obrazky);
	    $this->ulozDoDtb($hodnoty);
	}  catch(Exeptions $ex){
	    
	}
    }
    
    protected function upravObrazky($obrazky,$hodnoty)
    {
	try{
	    foreach($obrazky as $obrazek)
	    {
		if($obrazek->isOk() AND $obrazek->isImage())
		{
		    $pripona = pathinfo($obrazek->getSanitizedName(), PATHINFO_EXTENSION);
		    if(!$hodnoty->surname)
		    {
			$this->vizitka = pathinfo($obrazek->getSanitizedName(), PATHINFO_FILENAME);
		    }
		}
	    }
	} catch (Exception $ex) {

	}
	
    }
    
    
}
