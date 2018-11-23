<?php

class Item extends Model {
   public $id, $description, $expiration, $id_genre;

   public static function getFilms() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films 
               order by annee desc
               limit 0, 10";
      $stmt = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

      return $stmt;
   }

      public static function getGenres() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM genres";
      $stmt = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

      return $stmt;

   }

   public static function getFilmsByGenre($id_genre){
      $db = Database::getInstance();
      $stmt = $db->prepare("SELECT * FROM films
               inner join films_genres
               where films_genres.id_film = films.id
               and films_genres.id_genre = :id_genre");
      
      $stmt->bindValue(':id_genre', $id_genre, PDO::PARAM_INT);
      $stmt->execute()->fetchAll(PDO::FETCH_ASSOC);

      return $stmt;
   }

}



