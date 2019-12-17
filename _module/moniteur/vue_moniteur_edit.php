		<form method="post">
            <input type='hidden' name='mo_id' id='mo_id' value='<?= $mo_id ?>'>
            <p>
                <label for='mo_nom'>mo_nom</label>
                <input type='text' name='mo_nom' id='mo_nom' required value='<?= htmlentities($mo_nom,ENT_QUOTES,"utf-8") ?>'>
            </p>            
            <input type="submit" name="btsubmit" value="Enregistrer">
        </form>
