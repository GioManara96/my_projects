<?php

namespace contenitori;

session_start();

class Carrello
{
    private $totale;
    // variabile contenitore
    private $listaProdotti;

    // costruttore
    public function __construct()
    {
        $this->totale = 0;
        $this->listaProdotti = array();
    }

    // SET
    public function setTotale($valore)
    {
        $this->totale = $valore;
    }

    public function setLista($lista)
    {
        $this->listaProdotti = $lista;
    }

    // GET
    public function getTotale()
    {
        return $this->totale;
    }

    public function getLista()
    {
        return $this->listaProdotti;
    }

    // UTILITIES

    // verifica che nel carrello ci siano prodotti
    private function hasItems()
    {
        return (count($this->listaProdotti) > 0);
    }

    // aggiunge un prodotto
    public function addProdotto($prodotto)
    {
        if ($prodotto->getPrezzo() && $prodotto->getQuantità()) {
            array_push($this->listaProdotti, $prodotto);
            $this->totProdotti();
            return true;
        } else {
            $this->totProdotti();
            return false;
        }
    }

    public function removeProdotto($prodotto)
    {
        foreach ($this->listaProdotti as $i => $item) {
            //echo "<p>".$item->getSku()."</p>";
            if ($prodotto->getSku() == $item->getSku()) {
                unset($this->listaProdotti[$i]);
                $this->listaProdotti = array_values($this->listaProdotti);
                $this->totProdotti();
            }
        }
    }

    public function totProdotti()
    {
        $tot = 0;
        if ($this->hasItems()) {
            foreach ($this->listaProdotti as $id => $prodotto) {
                $tot += $prodotto->getQuantità();
            }
        }
        $this->totale = $tot;
        return $tot;
    }

    public function totSpesa()
    {
        $tot = 0.00;
        for ($i = 0; $i < count($this->listaProdotti); $i++) {
            $tot += $this->listaProdotti[$i]->getQuantità() * $this->listaProdotti[$i]->getPrezzo();
        }
        return $tot;
    }

    public function clear()
    {
        unset($this->listaProdotti);
        $this->listaProdotti = array();
        $this->totProdotti();
    }
}
