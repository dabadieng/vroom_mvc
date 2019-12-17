        <h1>Génération du jeu de données</h1>        
        <?php       
        //création des moniteurs
        $nbmoniteur = 10;
        echo "<h1>Création des moniteur</h1>";
        $sql = "insert into moniteur values ";
        $data=[];        
        for ($i = 1; $i <= $nbmoniteur; $i++) {
            $nom=$faker->name;
            $data[]="(null,'$nom')";
        }
        $link->query($sql . implode(",",$data));
        
        //création des clients
        $nbclient = 100;
        echo "<h1>Création des clients</h1>";
        $sql = "insert into client values ";   
        $data=[];       
        for ($i = 1; $i <= $nbclient; $i++) {
            $cl_nom=$faker->name;            
            $data[]="(null,'$cl_nom')";               
        }  
        $link->query($sql . implode(",",$data));
        
        //création des voitures
        $nbvoiture = 20;
        echo "<h1>Création des voitures</h1>";
        $sql = "insert into voiture values ";        
        $data=[];  
        for ($i = 1; $i <= $nbvoiture; $i++) {
            $vo_immatriculation=strtoupper($faker->bothify('##???##'));
            $vo_nom=$faker->text(10);
            $data[]="(null,'$vo_immatriculation','$vo_nom')"; 
        }
        $link->query($sql . implode(",",$data));
         
        //création des leçon
        $nblecon = 100;
        echo "<h1>Création des leçon</h1>";
        $sql = "insert into lecon values ";        
		$data=[]; 	
        for ($i = 1; $i <= $nblecon; $i++) {
            $le_moniteur=rand(1,$nbmoniteur);
            $le_voiture=rand(0,$nbvoiture);			
            $x=rand(8,18);
            $le_heure_debut="$x:00";
            $x+=2;
            $le_heure_fin="$x:00";
            $le_date=date("Y-m-d",mktime(0,0,0,rand(1,12),rand(1,30),2019));            
            if ($le_voiture==0)				
                $data[]="(null,'$le_moniteur',null,'$le_heure_debut','$le_heure_fin','$le_date')";
            else
                $data[]="(null,'$le_moniteur','$le_voiture','$le_heure_debut','$le_heure_fin','$le_date')";
        }
        $link->query($sql . implode(",",$data));

        //création des planifications
        echo "<h1>Création des planifications</h1>";
        $tab=range(1,$nbclient);
        $sql = "insert into plannifier values ";     
        $data=[];   
        for ($i = 1; $i <= $nblecon; $i++) {
            $le_lecon=$i;
            //nombre de client inscrit à la leçon
            $nbin=rand(1,10);
            /**
			* tirer au hasard $nbin clients différents :
			* - prendre les nombre de 1 à $nbclient
			* - mélanger
			* - prendre $nbin valeurs
			*/	
            shuffle($tab);
            for($k=1; $k<=$nbin ;$k++) {
                $le_client=$tab[$k];                
                $data[]="(null,'$le_lecon','$le_client')";
            }
        }
        $link->query($sql . implode(",",$data));
        ?>