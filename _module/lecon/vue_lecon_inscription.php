        <form method="post" action="<?=hlien("lecon","inscription")?>">
            <input type="hidden" name="le_id" value="<?=$le_id?>" >
            <p>
                <label for="chercher">Chercher un client</label>
                <input type="text" name="chercher" id="chercher" placeholder="Tapez les 1ere lettres du nom" >
            </p>
            <input type="submit" name="btsubmit" value="chercher">
        </form> 
        <div>
            <ul>
                <?php foreach($data as $row) {
                    extract($row);
                    echo "<li>$cl_nom <a href='" . hlien("lecon","inscription","&cl_id=$cl_id&le_id=$le_id") . "'>Inscrire</a></li>";
                }   
                ?> 
            </ul>
        </div>       
