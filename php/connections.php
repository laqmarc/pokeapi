<?php 

require_once './php/connection.php';

    if (isset($_GET['id']))
    {
   
        $name = $_GET['id'];
       
        //connection to pokemon
   
        $url = "https://pokeapi.co/api/v2/pokemon/$name/"; 
        $connectionApi = new Connection();
        $connectionResponse = $connectionApi->getConnection($url);
        $pokemon = json_decode($connectionResponse, true);  

        //conection to pokemon-species

        $h = $connectionApi->getConnection($pokemon['species']['url']);
        $pokemmonSpecie = json_decode($h, true);

        // Connection to generation name

        $generation = $connectionApi->getConnection($pokemmonSpecie['generation']['url']);
        $generationName = json_decode($generation, true);

    }


?>