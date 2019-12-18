<?php
$menu=array(
    [hlien("lecon","index"),"Leçon"], 
    [hlien("moniteur","index"),"Moniteur"],    
    [hlien("client","index"),"Client"],
    [hlien("database","creer"),"RAZ BDD"],
    [hlien("database","dataset"),"jeu de données"]
);
?>
<div class="myflexMenu">
	<?php affiche_menu($menu); ?>		
</div>