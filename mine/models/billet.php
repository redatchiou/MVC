<?php
    require_once('model.php');
    class Billet extends Model 
    {
        public function getBillet()
        {
            $statement = $this->pdo->prepare('SELECT * FROM t_billet');
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getBilletById($id)
        {
            $statement = $this->pdo->prepare('SELECT * FROM t_billet WHERE BIL_ID = :id');
            $statement->bindValue(':id', $id);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }
    }
    $pdo = new Billet();
    echo '<pre>';
    var_dump($pdo->getBilletById(1)) ;
    echo '</pre>';
?>