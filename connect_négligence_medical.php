<?php 
   $titre=$_POST['titre'];
   $nbrevictimes=$_POST['nbrevictimes'];
   $type=$_POST['type'];
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
        $stmt = $conn->prepare("insert into negligences_medicales(titre,nbrevictimes,type,nbrenfants,nbrfemmes,nbrhommes,lieu,source,dateEvenement,datepost) value(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss",$titre, $nbrevictimes,$type,$nbrenfants,$nbrfemmes,$nbrhommes,$lieu, $source,$dateEvenement,$datepost);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: graph_negligence.php");
    }
?>