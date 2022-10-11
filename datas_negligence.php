<?php
    include ("db.php");
 
    for ($mois = 1; $mois <= 12; $mois++) { 
        $info = $db->prepare("SELECT COUNT(*) AS total FROM negligences_medicales WHERE MONTH(dateEvenement) = $mois");
        $info->execute();
        $info->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $info->fetch();

        $total[] = $tab['total'];
    }

    $total_jan = $total[0];
    $total_feb = $total[1];
    $total_mar = $total[2];
    $total_apr = $total[3];
    $total_may = $total[4];
    $total_jun = $total[5];
    $total_jul = $total[6];
    $total_aug = $total[7];
    $total_sep = $total[8];
    $total_oct = $total[9];
    $total_nov = $total[10];
    $total_dec = $total[11];

?>