<?php

class IndexController extends Controller {
   
   public function display() {
      $this->view->genres = Item::getGenres();
      $this->view->films = Item::getFilms();

      $this->view->display();
   }

}
