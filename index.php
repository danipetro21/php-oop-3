<?php

class Stipendio
{



    private $mensile;
    private $tredicesima;
    private $quattordicesima;
    private $stipendio;


    public function __construct($mensile, $tredicesima, $quattordicesima)
    {
        $this->setMensile($mensile);
        $this->setTredicesima($tredicesima);
        $this->setQuattordicesima($quattordicesima);
    }

    public function setMensile($mensile)
    {
        $this->mensile = $mensile;
    }
    public function getMensile()
    {
        return $this->mensile;
    }
    public function setTredicesima($tredicesima)
    {
        $this->tredicesima = $tredicesima;
    }
    public function getTredicesima()
    {
        return $this->tredicesima;
    }
    public function setQuattordicesima($quattordicesima)
    {
        $this->quattordicesima = $quattordicesima;
    }
    public function getQuattordicesima()
    {
        return $this->quattordicesima;
    }

    public function getStipendio()
    {

        $stipendio = $this->getMensile() * 12 + $this->getTredicesima() + $this->getQuattordicesima();
        return $stipendio;
    }

    public function getHtml(){
        return "Stipendio annuo: " . $this->getStipendio() . " €";
    }
}

class Persona
{
    
    private $nome;
    private $cognome;
    private $data_di_nascita;
    private $luogo_di_nascita;
    private $cf;  
    
    public function __construct($nome,$cognome,$data_di_nascita,$luogo_di_nascita,$cf)
    {
        $this-> setNome($nome);
        $this-> setCognome($cognome);
        $this-> setDataNascita($data_di_nascita);
        $this-> setLuogoNascita($luogo_di_nascita);
        $this-> setCf($cf);


    }


    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setCognome($cognome){
        $this->cognome = $cognome;

    }
    public function getCognome(){
        return $this->cognome;

    }
    public function setDataNascita($data_di_nascita){
        $this->data_di_nascita = $data_di_nascita;

    }
    public function getDataNascita(){
        return $this->data_di_nascita;

    }
    public function setLuogoNascita($luogo_di_nascita){
        $this->luogo_di_nascita = $luogo_di_nascita;

    }
    public function getLuogoNascita(){
        return $this->luogo_di_nascita;

    }
    public function setCf($cf){
        $this->cf = $cf;

    }    
    public function getCf(){
        return $this->cf;

    }

    public function getHtml(){
        return "Nome: " . $this->getNome() . "<br>" . 
                "Cognome: " . $this->getCognome() . "<br>" . 
                "Data di nascita: " . $this->getDataNascita() . "<br>" . 
                "Luogo di nascita: " . $this->getLuogoNascita() . "<br>" . 
                "Codice fiscale: " .$this->getCf() . "<br>"; 
    }


}

class Impiegato extends Persona
{
}

class Capo extends Persona
{
}

$stipendio = new Stipendio(1600, 1100, 950);
echo $stipendio -> getHtml();

echo "<br>" . "<br>";

$daniele = new Persona("daniele", "petrollo" , "2000-05-21", "Assisi" , "1234567890443");
echo $daniele -> getHtml();
