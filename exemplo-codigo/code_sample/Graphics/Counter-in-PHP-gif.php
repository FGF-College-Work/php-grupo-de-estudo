
<? 

    $fichier=fopen("compteur.txt","r"); #change here the name of your file 

    if ($fichier == 0) 

    { 
        echo "Erreur : fichier incorrect"; 
    } 

    else 

    { 
        $compteur=fgets($fichier,4096); 
        fclose($fichier); 
        $newfichier=fopen("compteur.txt","w"); #change here the name of your file 
        $compteur = $compteur + 1; 
        $num = $length = strlen($compteur); 

        while ($num >= 0) { 
            $CHAR[$num] = substr($compteur, $num,  1); 
            $num--; 
        } 
        $j = 0; 

        while ($j < $length) { 
             echo "<img src=images/".$CHAR[$j].".gif>";#change the path of your gifs 
             $j++; 
        } 

        fputs($newfichier,$compteur); 
        fclose($newfichier); 

  } 

?>
