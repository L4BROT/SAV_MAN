<?php
if(isset($liste_SAV)){
    ?>
    <h2 id="titre_art">Liste SAV :</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Article</th>
                <th>Prix</th>
                <th>Garantie</th>
                <th>Qte SAV</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($liste_SAV as $article) {
                ?>
                <tr>
                    <td>
                        <?php echo $article["LIBELLE_ART"]; ?>
                    </td>
                    <td>
                        <?php echo $article["PRIX_ART"] . " €"; ?>
                    </td>
                    <td>
                        <?php echo $article["GARANTIE_ART"] . " Ans"; ?>
                    </td>
                    <td>
                        <?php echo $article["QTE_SAV"]; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}


if(isset($liste_rebus)){
    ?>
    <h2 id="titre_art">Liste Rebus :</h2>
    <table id="myTable" class="table table-dark table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Article</th>
                <th>Prix</th>
                <th>Garantie</th>
                <th>Qte Rebus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($liste_rebus as $article) {
                ?>
                <tr>
                    <td>
                        <?php echo $article["LIBELLE_ART"]; ?>
                    </td>
                    <td>
                        <?php echo $article["PRIX_ART"] . " €"; ?>
                    </td>
                    <td>
                        <?php echo $article["GARANTIE_ART"] . " Ans"; ?>
                    </td>
                    <td>
                        <?php echo $article["QTE_REBUS"]; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}