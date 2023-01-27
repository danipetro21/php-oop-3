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
                "Codice fiscale: " .$this->getCf(); 
    }


}

class Impiegato extends Persona
{
    private Stipendio $stipendio;
    private $dataAssunzione;

    public function __construct($nome,$cognome,$data_di_nascita,$luogo_di_nascita,$cf, Stipendio $stipendio, $dataAssunzione)
    {
        parent :: __construct($nome, $cognome, $data_di_nascita, 
                                $luogo_di_nascita, $cf);

        $this -> setStipendio($stipendio);
        $this -> setDataAssunzione($dataAssunzione);
    }

    public function setStipendio($stipendio){
        $this->stipendio = $stipendio;
    }        
    public function getStipendio(){
        return $this->stipendio;
    }
    public function setDataAssunzione($dataAssunzione){
        $this->dataAssunzione = $dataAssunzione;
    }
    public function getDataAssunzione(){
        return $this->dataAssunzione;
    }

    public function getAnnualSalary() {

        return $this -> getStipendio() -> getStipendio();
    }    

    public function getHtml() {

        return parent :: getHtml() . "<br>" .
             "Data Assunzione: ". $this -> getDataAssunzione() . "<br>" .
             $this -> getStipendio() -> getHtml();
    }

}

class Capo extends Persona
{
    private $dividendo;
    private $bonus;

    public function __construct($nome,$cognome,$data_di_nascita,$luogo_di_nascita,$cf, $dividendo, $bonus)
    {
        parent :: __construct($nome, $cognome, $data_di_nascita, 
                                $luogo_di_nascita, $cf);

        $this -> setDividendo($dividendo);
        $this -> setBonus($bonus);
    }

    public function setDividendo($dividendo){
        $this->dividendo = $dividendo;
    }
    public function getDividendo(){
        return $this->dividendo;
    }
    public function setBonus($bonus){
        $this->bonus= $bonus;
    }
    public function getBonus(){
        return $this-> bonus;
    }

    public function redditoA(){
        // dividendo * 12 + bonus

        return ($this->getDividendo() * 12 ) + $this->getBonus();

    }

    public function getHtml()
    {
        return parent :: getHtml() . "<br>" .
        "Dividendo: ". $this -> getDividendo() . "<br>" .
        "Bonus: " . $this -> getBonus() . "<br>" .
        "Reddito annuale: " . $this->redditoA() . " €";
    }
}

$stipendio = new Stipendio(1600, 1100, 950);
echo "<h1>IMPIEGATO</h1>";
$daniele = new Impiegato("daniele", "petrollo" , "2000-05-21", "Assisi" , "1234567890443", $stipendio, "2019-01-12" );
echo $daniele -> getHtml();

echo "<br> <br>";
echo "<h1>CAPO</h1>";
$maddalena = new Capo("Pinco" , "Pallo" , "1987-09-16" , "Roma", "34834384838838" , 3422, 12222);
echo $maddalena -> getHtml();

