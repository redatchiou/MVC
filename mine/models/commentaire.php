<?php
    require_once('model.php');
    class Commentaire extends Model 
    {
        public function getCommentaires($id)
        {
            $statement = $this->pdo->prepare('SELECT * FROM t_commentaire WHERE BIL_ID = :id');
            $statement->bindValue(':id', $id);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        public function ajouterCommentaire($auteur, $contenu, $idBillet)
        {
            $statement = $this->pdo->prepare('INSERT INTO t_commentaire(COM_AUTEUR, COM_CONTENU, BIL_ID) VALUES(:auteur, :contenu, :idBillet)');
            $statement->bindValue(':auteur', $auteur);
            $statement->bindValue(':contenu', $contenu);
            $statement->bindValue(':idBillet', $idBillet);
            $statement->execute();
        }
    }
    $pdo = new Commentaire();
    echo '<pre>';
        var_dump($pdo->getCommentaires(1)) ;
    echo '</pre>';
    // $db->ajouterCommentaire("abdelmoumne", "bravo", "1"); 
?>