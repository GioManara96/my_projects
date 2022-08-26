<?php

namespace classi;

class Prodotto{
    private $sku;
    private $nome;
    private $descrizione;
    private $prezzo;
    private $giacenza;
    private $costo;
    private $quantità;
    private $image;

    // definizione struttura costruttore
    public function __construct($sku, $nome, $prezzo, $quantità, $image)
    {
        $this->sku = (is_null($sku)) ? $this->genSku() : $sku;;
        $this->nome = $nome;
        $this->descrizione = "n.p.";
        $this->prezzo = $prezzo;
        $this->giacenza = "n.p.";
        $this->costo = "n.p.";
        $this->quantità = $quantità;
        $this->image = $image;
    }

    // METODI SET

    public function setSku($sku){
        $this->sku = $sku;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setDescrizione($descrizione){
        $this->descrizione = $descrizione;
    }

    public function setPrezzo($prezzo){
        $this->prezzo = $prezzo;
    }

    public function setGiacenza($giacenza){
        $this->giacenza = $giacenza;
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }

    public function setQuantità($quantità){
        $this->quantità = $quantità;
    }

    public function setImage($image){
        $this->image = $image;
    }

    // METODI GET

    public function getSku(){
        return $this->sku;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDescrizione(){
        return $this->descrizione;
    }

    public function getPrezzo(){
        return $this->prezzo;
    }

    public function getGiacenza(){
        return $this->giacenza;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getQuantità(){
        return $this->quantità;
    }

    public function getImage(){
        return $this->image;
    }

    // FUNZIONI DI UTILITY
    public function getValutazioneMagazzino(){
        return $this->prezzo * $this->giacenza;
    }

    public function getCostoMagazzino(){
        return $this->costo * $this->giacenza;
    }

    public function getMargineMagazzino(){
        return $this->getValutazioneMagazzino() - $this->getCostoMagazzino();
    }

    public function genSku() {
        $prefix = 'pr0';
        $output = $prefix;
        $chars = range('a','z');
        $digits = range(0, 9);
        $parts = array_merge($chars, $digits);
        for($i = 0; $i < 8; $i++) {
           $output .= $parts[mt_rand(0, count($parts) - 1)];
         }
       return $output;
    }

}



?>