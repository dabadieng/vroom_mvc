        <h1>Les clients</h1>
        <table>
            <caption>
                <a href="<?=hlien("client","edit","&id=0")?>">Créer un client</a>
            </caption>
            <tr>
                <th>id</th>
                <th>nom</th>
            </tr>
            <?php
            foreach($data as $row) {
                $row=array_map("cb_htmlentities",$row);
                extract($row);
                echo "<tr>";
                echo "<td>$cl_id</td>";
                echo "<td>$cl_nom</td>";
                echo "<td><a href='" . hlien("client","edit","&id=$cl_id") . "'>Editer</a></td>";
                echo "<td><a href='" . hlien("client","del","&id=$cl_id") . "'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
