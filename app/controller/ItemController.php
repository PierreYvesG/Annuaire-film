<?php

class ItemController extends Controller {

   public function displayByGenre() {
      $id_genre = $this->route["params"]["id_genre"];
      $this->view->item = Item::getFilmsByGenre($id_genre);
      
      $this->view->display();
   }

}
