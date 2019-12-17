        <h1>Bienvenu sur Mon Auto école</h1>
        <table>
            <caption>
                <a href="<?=hlien("moniteur","edit","&id=0")?>">Créer un moniteur</a>
            </caption>
            <tr>
                <th>id</th>
                <th>nom</th>
                <td>planning</td>
                <td>editer</td>
                <td>supprimer</td>
            </tr>
            <?php
            foreach($data as $row) {
                $row=array_map("cb_htmlentities",$row);
                extract($row);
                echo "<tr>";
                echo "<td>$mo_id</td>";
                echo "<td>$mo_nom</td>";
                echo "<td><a href='" . hlien("moniteur","planning","&id=$mo_id") . "'>Planning</a></td>";
                echo "<td><a href='" . hlien("moniteur","edit","&id=$mo_id") . "'>Editer</a></td>";
                echo "<td><a href='" . hlien("moniteur","del","&id=$mo_id") . "'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
