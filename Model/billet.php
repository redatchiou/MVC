<?php
require('modele.php');
    try {
        $conn = new Billet("mysql:host=localhost;dbname=mydb", 'root', 'root');
        $conn-> getBillets();
        $conn-> getBillet(1);
    } catch (PDOException $e) {
        die("Impossible de se connecter :" . $e->getMessage());
    }
    class Billet extends PDO {
        function getBillets(){
            $sql = 'select * from t_billet';
            $result = $this->query($sql) ;
            echo "<table border=1>";
            foreach ($result as [$BIL_ID,$BIL_DATE,$BIL_TITRE,$BIL_CONTENU]) {
                echo <<<"tr"
                    <tr>
                        <td>$BIL_ID</td>
                        <td>$BIL_DATE</td>
                        <td>$BIL_TITRE</td>
                        <td>$BIL_CONTENU</td>
                    </tr>
                tr;
            }
            echo "</table>";
        }
        function getBillet($idBillet){
            $sql ="select * from t_billet where BIL_ID=$idBillet";
            $result = $this->query($sql) ;
            echo "<table border=1>";
            foreach ($result as [$BIL_ID,$BIL_DATE,$BIL_TITRE,$BIL_CONTENU]) {
                echo <<<"tr"
                    <tr>
                        <td>$BIL_ID</td>
                        <td>$BIL_DATE</td>
                        <td>$BIL_TITRE</td>
                        <td>$BIL_CONTENU</td>
                    </tr>
                tr;
            }
            echo "</table>";
        }
    }

