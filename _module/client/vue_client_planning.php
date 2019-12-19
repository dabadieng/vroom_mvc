        <h1>planning de moniteur (N°<?=$mo_id?>)</h1>
        <ul>
        <?php
        foreach($data as $row) {
            extract($row);
            echo "<li>(#$le_id) le $le_date - de $le_heure_debut à $le_heure_fin</li>";
        }
        ?>
        </ul>
