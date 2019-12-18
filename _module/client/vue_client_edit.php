    <h1>Leçon n°<?=$id?></h1>
		<form method="post">
            <input type='hidden' name='cl_id' id='cl_id' value='<?= $cl_id ?>'>
            <p>
                <label for='cl_nom'>cl_nom</label>
                <input type='text' name='cl_nom' id='cl_nom' required value='<?= htmlentities($cl_nom,ENT_QUOTES,"utf-8") ?>'>
            </p>            
            
            
            <input type="submit" name="btsubmit" value="Enregistrer">
        </form>
        