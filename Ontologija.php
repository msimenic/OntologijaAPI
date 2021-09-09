<?php

namespace Simenic;

/**
 * @Entity @Table(name="ontologija")
 **/


class Ontologija
{
    /** @id @Column(type="integer") @GeneratedValue **/
    protected $sifra;

    /**
    * @Column(type="string")
    */
    public $ime_redatelja;

    /**
    * @Column(type="string")
    */
    public $grad_premijere;

    /**
    * @Column(type="string")
    */
    public $uDrzavi;

    /**
    * @Column(type="string")
    */
    public $jePremijernoPrikazan;

    /**
    * @Column(type="integer")
    */
    public $uGodini;

    /**
    * @Column(type="integer")
    */
    public $zaradioJe;

 


  public function getSifra(){
    return $this->sifra;
  }

  public function setSifra($sifra){
    $this->sifra = $sifra;
  }

  public function getIme_redatelja(){
    return $this->ime_redatelja;
  }

  public function setIme_redatelja($ime_Redatelja){
    $this->ime_redatelja = $ime_Redatelja;
  }

  public function getGrad_premijere(){
    return $this->grad_premijere;
  }

  public function setGrad_premijere($grad_premijere){
    $this->grad_premijere = $grad_premijere;
  }

  public function getUdrzavi(){
    return $this->uDrzavi;
  }

  public function setUdrzavi($uDrzavi){
    $this->uDrzavi = $uDrzavi;
  }

  public function getJePremijernoPrikazan(){
        return $this->jePremijernoPrikazan;
      }
    
  public function setJePremijernoPrikazan($jePremijernoPrikazan){
    $this->jePremijernoPrikazan = $jePremijernoPrikazan;
  }
  public function getUgodini(){
    return $this->uGodini;
  }

  public function setUgodini($uGodini){
    $this->uGodini = $uGodini;
  }

  public function getZaradioJe(){
    return $this->zaradioJe;
  }

  public function setZaradioJe($zaradioJe){
    $this->zaradioJe = $zaradioJe;
  }

  public function setPodaci($podaci)
	{
		foreach($podaci as $kljuc => $vrijednost){
			$this->{$kljuc} = $vrijednost;
		}
    }
}


?>