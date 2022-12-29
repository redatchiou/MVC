<?php
    require('modele.php');
    class Commentaire extends PDO{
        function getCommentaires($idBillet){
            $sql ="select * from t_commentaire where BIL_ID=$idBillet";
            $result = $this->query($sql) ;
            echo "<table border=1>";
            foreach ($result as [$COM_ID,$COM_DATE,$COM_AUTEUR,$COM_CONTENU]) {
                echo "<tr>";
                echo "<td>$COM_ID</td>";
                echo "<td>$COM_DATE</td>";
                echo "<td>$COM_AUTEUR</td>";
                echo "<td>$COM_CONTENU</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        function ajouterCommentaire($auteur, $contenu, $idBillet){
            $sql ="INSERT INTO t_commentaire (COM_AUTEUR,COM_CONTENU,BIL_ID) VALUES(?,?,?)";
            $stmt = $this->prepare($sql);
            $stmt->execute(array($auteur, $contenu,$idBillet));
        }
    }


        try {
            $conn = new Commentaire("mysql:host=localhost;dbname=mydb", 'root', 'root');
            $conn-> getCommentaires(1);
            $conn-> ajouterCommentaire('Ali', "brnjour", 2);
        } catch (PDOException $e) {
            die("Impossible de se connect!! :" . $e->getMessage());
        }
    