<?php 
   $titre=$_POST['titre'];
   $nbrevictimes=$_POST['nbrevictimes'];
   $nbrenfants=$_POST['nbrenfants'];
   $nbrfemmes=$_POST['nbrfemmes'];
   $nbrhommes=$_POST['nbrhommes'];
   $lieu=$_POST['lieu'];
   $source=$_POST['source'];
   $dateEvenement=$_POST['dateEvenement'];
   $datepost= date('y-m-d h:i:s');

    //Database connection

    $conn = new mysqli('localhost','root','','secure_level_bdd');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into inondations(titre,nbrevictimes,nbrenfants,nbrfemmes,nbrhommes,lieu,source,dateEvenement,datepost) value(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$titre, $nbrevictimes,$nbrenfants,$nbrfemmes,$nbrhommes,$lieu, $source,$dateEvenement,$datepost);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: graph_innondation.php");
    }
?>