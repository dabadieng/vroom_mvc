        <h1>Leçon n°<?=$id?></h1>
		<form method="post">
            <input type='hidden' name='le_id' id='le_id' value='<?= $le_id ?>'>
            <p>
                <label for='le_date'>le_date</label>
                <input type='text' name='le_date' id='le_date' required value='<?= htmlentities($le_date,ENT_QUOTES,"utf-8") ?>'>
            </p>            
            <p>
                <label for='le_heure_debut'>le_heure_debut</label>
                <input type='text' name='le_heure_debut' id='le_heure_debut' required value='<?= htmlentities($le_heure_debut,ENT_QUOTES,"utf-8") ?>'>
            </p>
            <p>
                <label for='le_heure_fin'>le_heure_fin</label>
                <input type='text' name='le_heure_fin' id='le_heure_fin' required value='<?= htmlentities($le_heure_fin,ENT_QUOTES,"utf-8") ?>'>
            </p>
            <p>
                <label for='le_moniteur'>le_moniteur</label>
                <select name='le_moniteur' id='le_moniteur'>
                    <?php
                    HTMLselect($link,"select mo_id id, mo_nom label from moniteur",$le_moniteur);
                    ?>
                </select>
            </p>
            <p>
                <label for='le_voiture'>le_voiture</label>
                <select name='le_voiture' id='le_voiture'>
                    <option value="0">Aucune</option>
                    <?php
                    HTMLselect($link,"select vo_id id, concat(vo_immatriculation,' - ', vo_nom) label from voiture",$le_voiture);
                    ?>
                </select>
            </p>
            <input type="submit" name="btsubmit" value="Enregistrer">
        </form>
        
        <h2>Liste des inscrits</h2>
        <table>
            <?php if ($le_id!=0) { ?>
            <caption><a href="<?=hlien("lecon","inscription","&id=$le_id")?>">Inscrire des clients</a></caption>
            <?php } ?>            
            <tr>
                <th>client</th>
                <th>Désinscrire</th>
            </tr>
            <?php
                $data=listeInscrit($le_id);
                foreach($data as $row) {
                    extract($row);
                    echo "<tr>";
                    echo "<td>$cl_nom</td>";
                    echo "<td><a href='" . hlien("lecon","desinscrire","&le_id=$le_id&cl_id=$cl_id") . "'>Désinscrire</a></td>";
                    echo "</tr>";

                    
                }
            ?>            
        </table>               
