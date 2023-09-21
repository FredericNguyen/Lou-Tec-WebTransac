<?php

    $tab = [];
    $produit1 = new Produit("RÉCUREUSE (LAVEUSE) À PLANCHER 28″-34″", 236, "../../client/assets/img/products-01.jpg");
    $produit2 = new Produit("CHARIOT TÉLESCOPIQUE 10000 LB - DIECI - ICARUS 45.17", 910, "../../client/assets/img/products-02.jpg");
    $produit3 = new Produit("CÂBLE DE NYLON - 7/8″ X 300", 51, "../../client/assets/img/products-03.jpg");
    array_push($tab, $produit1, $produit2, $produit3);
    
   function createCards() {
    global $tab;
    $cards = `<div class="row">`;
    foreach ($tab as $produit) {
      $titre = $produit->getTitre();
      $prix = $produit->getPrix();
      $img = $produit->getImg();
      $cards.`  <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <img src="`.$img.`" class="card-img-top" alt="...">
          <h5 class="card-title">`.$titre.`</h5>
          <p class="card-text"><span>`.$prix.`</span><span></span></p>
        </div>
      </div>
    </div>`;
    }
   }
?>