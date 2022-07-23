<?php 

require_once '../pokeapi/php/connection.php';

    if (isset($_POST))
    {
   
        $name = $_GET['id'];
       
        //connection to pokemon
   
        $url = "https://pokeapi.co/api/v2/pokemon/$name/"; 
        $connn = new Connection();
        $r = $connn->getConnection($url);
        $pokemon = json_decode($r, true);  

        //conection to pokemon-species

        $conhabitat = new Connection();
        $h = $conhabitat->getConnection($pokemon['species']['url']);
        $ps = json_decode($h, true);

        // Connection to generation name

        $generationname = new Connection();
        $generation = $generationname->getConnection($ps['generation']['url']);
        $gn = json_decode($generation, true);

        


    }


?>