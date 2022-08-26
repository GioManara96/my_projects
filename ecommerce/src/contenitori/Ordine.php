<?php

namespace contenitori;
use classi\Customer;

class Ordine{
    private $id;
    private $cart;
    private $cliente;
    private $totale;
    private $status;

    // COSTRUTTORE
    public function __construct($id, Carrello $cart, Customer $cliente) {
        $this->id = $id;
        $this->cart = $cart;
        $this->cliente = $cliente;
        $this->totale = $this->cart->totSpesa();
        $this->status = 0;
        $this->setTotaleConIVA();
    }

    // SET 
    public function setId($id){
        $this->id = $id;
    }

    public function setCart($cart){
        $this->cart = $cart;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function setTotale($totale){
        $this->totale = $totale;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    // GET
    public function getId(){
       return $this->id;
    }

    public function getCart(){
       return $this->cart;
    }

    public function getCliente(){
       return $this->cliente;
    }

    public function getTotale(){
       return $this->totale;
    }

    public function getStatus(){
       return $this->status;
    }
    
    // UTILITIES
    public function setTotaleConIVA(){
        $this->totale += (22 * $this->totale / 100);
        return $this->totale;
    }
}