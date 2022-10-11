<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="puff1.css">
    <title>Formulaire d'ajout</title>
    <?php include "seting.php"; ?>
    <script defer src="accidents.js"></script>
</head>

<body>
    <div class="principal">
        <div class="secondaire">
            <!-- fond degrade -->
            <div class="trois">
                <div class="sidebar_gche">
                    <div class="menu">
                        <a href="index.php">
                            <div class="puce_blanche">01</div>
                            <div class="list-item">Accidents</div>
                        </a>
                        <a href="vol.php">
                            <div class="puce_blanche">02</div>
                            <div class="list-item">Vol</div>
                        </a>
                        <a href="graph_viols.php">
                            <div class="puce_verte">03</div>
                            <div class="list-item">Viol</div>
                        </a>
                        <a href="meutre.php">
                            <div class="puce_blanche">04</div>
                            <div class="list-item">Meutre</div>
                        </a>
                        <a href="Suicide.php">
                            <div class="puce_blanche">05</div>
                            <div class="list-item">Suicide</div>
                        </a>
                        <a href="incendie.php">
                            <div class="puce_blanche">06</div>
                            <div class="list-item">Incendies</div>
                        </a>
                        <a href="innondation.php">
                            <div class="puce_blanche">07</div>
                            <div class="list-item">Inondations</div>
                        </a>
                        <a href="negligeance_medicale.php">
                            <div class="puce_blanche">08</div>
                            <div class="list-item">Négligence Médical</div>
                        </a>
                    </div>
                </div>
                <div class="fond_blanc">
                    <div class="section_centrale">

                        <div class="formulaire">
                            <div class="text-inform">
                                <h3 class="text">Recensement Viol</h3>
                                <p class="text1"> Please enter your information and proceed to the next step so we can build your accounts</p>
                            </div>
                            <form action="connect_viol.php" method="POST">
                                <div class="first">
                                    <div class="titre">
                                        <fieldset>
                                            <legend>Titre</legend>
                                            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
                                        </fieldset>
                                    </div>
                                    <div class="nbrvictime">
                                        <fieldset>
                                            <legend>nombre de victime </legend>
                                            <input type="number" class="form-control" id="nbrevictimes" oninput="handleInput()" name="nbrevictimes" placeholder="nombre de victime" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="place">
                                    <div class="engin">
                                        <fieldset>
                                            <legend>type de viol</legend>
                                            <select name="typeviol" id="typeviol">
                                                <option value=""></option>
                                                <?php foreach ($accidd as $typeviols) : ?>
                                                    <option value="<?= $typeviols->id ?>"><?= $typeviols->typeviols ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div>
                                    <div class="nombre">
                                        <div class="nbrenfant">
                                            <fieldset>
                                                <legend>nombre d'enfant</legend>
                                                <input type="number" name="nbrenfants" id="nbrenfants" class="form-control" oninput="handleInput()" placeholder="nombre d'enfant" required>
                                            </fieldset>
                                        </div>
                                        <div class="nbrdfemme">
                                            <fieldset>
                                                <legend>nombre de femme </legend>
                                                <input type="number" class="form-control" id="nbrfemmes" name="nbrfemmes" oninput="handleInput()" placeholder="nombre de femme" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="nbrdhomme">
                                        <fieldset>
                                            <legend>nombre d'homme</legend>
                                            <input type="text" name="nbrhommes" id="nbrhommes" class="form-control" oninput="handleInput()" placeholder="nombre d'homme" required>
                                        </fieldset>
                                    </div>
                                    <div class="lieu">
                                        <fieldset>
                                            <legend>lieu </legend>
                                            <select name="lieu" id="lieu">
                                                <option value=""></option>
                                                <?php foreach ($jour as $ville) : ?>
                                                    <option value="<?= $ville->id ?>"><?= $ville->ville ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="source">
                                    <fieldset>
                                        <legend>source </legend>
                                        <input type="text" class="form-control" id="source" name="source" placeholder="source" required>
                                    </fieldset>
                                </div>
                                <div class="date">
                                    <label>Date de l'evenement: </label>
                                    <div>
                                        <div class="dateevenement">
                                            <fieldset>
                                                <input type="date" name="dateEvenement" id="dateEvenement">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <button name="submit" id="bouton" type="submit" disabled>Enregistrement
                                </button>
                                <div class="cercle_vert"> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>