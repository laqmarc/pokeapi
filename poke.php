<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeapi</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body id="pokepage">

    <?php 

    require_once '../pokeapi/php/connections.php';

    $pokeimage = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$pokemon['id'].'.png"';


    //POKE CARD INFO
    echo '<div class="bigcard">';
    echo '<a href="../" class="returntohome">Close</a>';
    echo '<div class="cardhead">';
    // var_dump($pokemon);

        echo '<img class="imgpoke" src="'.$pokeimage.'" onerror="imgError(this);" alt="Poekmon -'.$pokemon['name'].'">';

    
    echo '<h2 class="poke-title">'.$pokemon['name'].'</h2>';
    echo '<div class="card-info-stats">';
    
    foreach ($pokemon['stats'] as $stat) {
        echo '<p><span class="fontb">'.$stat['stat']['name'].'</span>: '.$stat['base_stat'].'</p>';
    }
    echo '<p><span class="fontb">Height: </span>'.$pokemon['height'].'</p>';
    echo '<p><span class="fontb">Weight: </span>'.$pokemon['weight'].'</p>';
    echo '<p><span class="fontb">Base experience: </span>'.$pokemon['base_experience'].'</p>';
    echo '</div></div>';

    echo '<div class="midlecard">';
    echo '<div class="card-info-midd br">';
    echo '<h2 class="fontb">Abilities:</h2>';

    echo '<div class="card-info-a">';
    foreach ($pokemon['abilities'] as $ability){
        echo '<p>'.$ability['ability']['name'].'</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '<div class="card-info-midd">';
    echo '<h2 class="fontb">Types:</h2>';
    echo '<div class="card-info-a">';
    foreach ($pokemon['types'] as $type) {
        echo '<p>'.$type['type']['name'].'</p>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    
//if some value is null then it will not show the value

if(empty($ps['habitat']['name'])){
    echo "";
}else{
    echo '<div class="fontb">Where to find:'. $ps['habitat']['name'].' </div>';

}


    

    
    echo '<div class="fontb">description:'. $ps['flavor_text_entries'][2]['flavor_text'].' </div>';
    echo '<div class="fontb">Color:'. $ps['color']['name'].' </div>';
    echo '<div class="fontb">Base happiness:'. $ps['base_happiness'].' </div>';
    echo '<div class="fontb">Capture Rate:'. $ps['capture_rate'].' </div>';
    echo '<div class="fontb">Gender:'. $ps['genera'][7]['genus'].' </div>';
    echo '<div class="fontb">Generation Name:'. $gn['names'][5]['name'].' </div>';


?>
</body>
<script>
    function imgError(image) {
        image.onerror = "";
        image.src = "../images/imagenotfound.jpg";
        return true;
    }
</script>
</html>