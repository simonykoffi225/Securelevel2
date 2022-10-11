<?php
// inclus connexion.php
include("db.php");

// recuperation de la liste des villes 
$vil = $db->prepare("SELECT * FROM ville ORDER BY ville ASC");
$vil->execute();
$vil->setFetchMode(PDO::FETCH_ASSOC);
$villes = $vil->fetchAll();
@$recherche = $_GET["recherche"];
@$lieu = $_GET["lieu"];
@$annee = $_GET["lieu"];

if (isset($recherche)) {
    if (($lieu != 0) && ($annee != 0)) {
        for ($mois = 1; $mois <= 12; $mois++) {
            $info = $db->prepare("SELECT COUNT(*) AS nbAccident FROM viols INNER JOIN ville ON lieu = id WHERE MONTH(dateEvenement) = $mois AND (lieu =$lieu) OR (YEAR(dateEvenement) = $annee)");
            $info->execute();
            $info->setFetchMode(PDO::FETCH_ASSOC);
            $tab = $info->fetch();
            $total[] = $tab['nbAccident'];
        }
    }
}

@$total_jan = $total[0];
@$total_feb = $total[1];
@$total_mar = $total[2];
@$total_apr = $total[3];
@$total_may = $total[4];
@$total_jun = $total[5];
@$total_jul = $total[6];
@$total_aug = $total[7];
@$total_sep = $total[8];
@$total_oct = $total[9];
@$total_nov = $total[10];
@$total_dec = $total[11];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="puff1.css">
    <link rel="stylesheet" href="graphe2.css">
    <title>Formulaire d'ajout</title>
    <script defer src="accidents.js"></script>
    <?php include "seting.php"; ?>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="principal">
        <div class="secondaire">
            <!-- fond degrade -->
            <div class="trois">
                <div class="sidebar_gche">
                    <div class="menu">
                        <a href="graph_accidents.php">
                            <div class="puce_blanche">01</div>
                            <div class="list-item">Accidents</div>
                        </a>
                        <hr>
                        <a href="graph_vols.php">
                            <div class="puce_blanche">02</div>
                            <div class="list-item">Vol</div>
                        </a>
                        <hr>
                        <a href="viol.php">
                            <div class="puce_verte">03</div>
                            <div class="list-item">Viol</div>
                        </a>
                        <hr>
                        <a href="graph_meurtre.php">
                            <div class="puce_blanche">04</div>
                            <div class="list-item">Meutre</div>
                        </a>
                        <hr>
                        <a href="graph_suicide.php">
                            <div class="puce_blanche">05</div>
                            <div class="list-item">Suicide</div>
                        </a>
                        <hr>
                        <a href="graph_incendie.php">
                            <div class="puce_blanche">06</div>
                            <div class="list-item">Incendies</div>
                        </a>
                        <hr>
                        <a href="graph_innondation.php">
                            <div class="puce_blanche">07</div>
                            <div class="list-item">Inondations</div>
                        </a>
                        <hr>
                        <a href="graph_negligence.php">
                            <div class="puce_blanche">08</div>
                            <div class="list-item">Négligence Médical</div>
                        </a>

                    </div>
                </div>
                <div class="fond_blanc">
                    <div class="section_centrale">

                        <div class="formulaire">
                            <div style="text-align:center; margin-top: 40px;">
                                <h3>Recensement Graph Viols</h3>
                                <p style="font-weight:bold; font-size: 15px;"> Se Graphe Nous Permet De Voir <br> Les Statistiques Des Différents Viols Dans Les Régions De La CI</p>
                            </div>
                            <form action="graph_viols.php" method="GET">
                                <div class="chartCard">
                                    <div class="chartBox">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                                <section class="barderecherche">

                                    <div class="barderecherche2">
                                        <select name="lieu">
                                            <option value=""></option>
                                            <?php foreach ($jour as $ville) : ?>
                                                <option value="<?= $ville->id ?>"><?= $ville->ville ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="barderecherche1">
                                        <select name="annee">
                                            <option>Choisir une annee</option>
                                            <option <?= (isset($_GET["annee"]) && $_GET["annee"] == "2022") ? "selected" : ""; ?> value="2022">2022</option>
                                            <option <?= (isset($_GET["annee"]) && $_GET["annee"] == "2021") ? "selected" : ""; ?> value="2021">2021</option>
                                            <option <?= (isset($_GET["annee"]) && $_GET["annee"] == "2020") ? "selected" : ""; ?> value="2020">2020</option>
                                            <option <?= (isset($_GET["annee"]) && $_GET["annee"] == "2019") ? "selected" : ""; ?> value="2019">2019</option>
                                            <option <?= (isset($_GET["annee"]) && $_GET["annee"] == "2018") ? "selected" : ""; ?> value="2018">2018</option>
                                        </select>
                                    </div>

                                    <div class="barderecherche3">
                                        <input type="submit" name="recherche" value="Rechercher">
                                    </div>
                                </section>

                                <?php include("datas_viols.php"); ?>

                                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    //setUp
                                    const data = {
                                        labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                                        datasets: [{
                                            label: 'Nombre de viols / Mois',
                                            data: [
                                                <?php echo $total_jan; ?>,
                                                <?php echo $total_feb; ?>,
                                                <?php echo $total_mar; ?>,
                                                <?php echo $total_apr; ?>,
                                                <?php echo $total_may; ?>,
                                                <?php echo $total_jun; ?>,
                                                <?php echo $total_jul; ?>,
                                                <?php echo $total_aug; ?>,
                                                <?php echo $total_sep; ?>,
                                                <?php echo $total_oct; ?>,
                                                <?php echo $total_nov; ?>,
                                                <?php echo $total_dec; ?>
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 26, 104, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgba(255, 26, 104, 1)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    };

                                    //confiG
                                    const config = {
                                        type: 'bar',
                                        data,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    };
                                    //render init block
                                    const myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config
                                    );
                                </script>
                            </form>
                            <div class="img">
                                <img src="Simon1.5x.png" alt="logo" >
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>