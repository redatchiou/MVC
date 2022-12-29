<?php
    class Billet extends PDO{
        public function __construct($dns, $root,$password) {
            parent::__construct($dns, $root,$password);
        }
        function getBillets(){
            $sql = 'select * from t_billet';
            $result = $this->query($sql) ;
            echo "<table border=1>";
            foreach ($result as [$BIL_ID,$BIL_DATE,$BIL_TITRE,$BIL_CONTENU]) {
                echo "<tr>";
                echo "<td>$BIL_ID</td>";
                echo "<td>$BIL_DATE</td>";
                echo "<td>$BIL_TITRE</td>";
                echo "<td>$BIL_CONTENU</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        function getBillet($idBillet){
            $sql ="select * from t_billet where BIL_ID=$idBillet";
            $result = $this->query($sql) ;
            echo "<table border=1>";
            foreach ($result as [$BIL_ID,$BIL_DATE,$BIL_TITRE,$BIL_CONTENU]) {
                echo "<tr>";
                echo "<td>$BIL_ID</td>";
                echo "<td>$BIL_DATE</td>";
                echo "<td>$BIL_TITRE</td>";
                echo "<td>$BIL_CONTENU</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }   
    class Commentaire extends PDO{
        public function __construct($dns, $root,$password) {
            parent::__construct($dns, $root,$password);
        }
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
?>