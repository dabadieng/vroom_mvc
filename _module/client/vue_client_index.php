        <h1>Les leçons</h1>
        <table>
            <caption>
                <a href="<?=hlien("lecon","edit","&id=0")?>">Créer une leçon</a>
            </caption>
            <tr>
                <th>id</th>
                <th>date</th>
                <th>heure début</th>                
                <th>heure fin</th>
                <th>moniteur</th>
                <th>voiture</th>
                <th>editer</th>
                <th>supprimer</th>
            </tr>
            <?php
            foreach($data as $row) {
                $row=array_map("cb_htmlentities",$row);
                extract($row);
                echo "<tr>";
                echo "<td>$le_id</td>";
                echo "<td>$le_date</td>";
                echo "<td>$le_heure_debut</td>";
                echo "<td>$le_heure_fin</td>";
                echo "<td>$mo_nom</td>";
                echo "<td>" . getVoiture($le_voiture) . "</td>";
                echo "<td><a href='" . hlien("lecon","edit","&id=$le_id") . "'>Editer</a></td>";
                echo "<td><a href='" . hlien("lecon","del","&id=$le_id") . "'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
