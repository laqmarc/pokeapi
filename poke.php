<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeapi</title>
    <link rel="stylesheet" href="./../css/style.css">

</head>

<body id="pokepage">

    <?php 

    require_once './php/connections.php';

    $pokeimage = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$pokemon['id'].'.png"';


    //POKE CARD INFO
    echo '<div class="bigcard">';
        echo '<a href="../" class="returntohome">Close</a>';
        echo '<div class="cardhead">';
            echo '<img class="imgpoke" src="'.$pokeimage.'" onerror="imgError(this);" alt="Poekmon -'.$pokemon['name'].'">';
            echo '<h2 class="poke-title fontb">'.$pokemon['name'].'</h2>';
                echo '<div class="card-info-stats">';
    
                    foreach ($pokemon['stats'] as $stat) {
                        echo '<p><span class="fontb">'.$stat['stat']['name'].'</span>: '.$stat['base_stat'].'</p>';
                    }
                    echo '<p><span class="fontb">Height: </span>'.$pokemon['height'].'</span></p>';
                    echo '<p><span class="fontb">Weight: </span>'.$pokemon['weight'].'</span></p>';
                    echo '<p><span class="fontb">Base experience: </span>'.$pokemon['base_experience'].'</span></p>';
                    echo '<p><span class="fontb">Base happiness:'. $ps['base_happiness'].' </span></p>';
                    echo '<p><span class="fontb">Capture Rate:'. $ps['capture_rate'].' </span></p>';
            echo '</div></div>';

            echo '<div class="midlecard">';
                echo '<div class="card-info-midd br">';
                    echo '<div class="fontb mt20 font15">'. $ps['flavor_text_entries'][2]['flavor_text'].' </div>';
                    echo '<div class="fontb mt20">Color:'. $ps['color']['name'].' </div>';
                    echo '<div class="fontb mt20">Gender:'. $ps['genera'][7]['genus'].' </div>';
                    echo '<div class="fontb mt20">'. $gn['names'][5]['name'].' </div>';
                    if(empty($ps['habitat']['name'])){
                        echo "";
                    }else{
                        echo '<div class="fontb mt20">Where to find:'. $ps['habitat']['name'].' </div>';
                    }
                echo '</div>';
            echo '</div>';
            echo '<div class="twoparts">';
                echo '<div class="fifty">';
                    echo '<h2 class="fontb">Abilities:</h2>';
                    foreach ($pokemon['abilities'] as $ability){
                        echo '<span class="fontb">'.$ability['ability']['name'].'</span>';
                    }
                echo '</div>';
                echo '<div class="fifty">';
                    echo '<h2 class="fontb">Types:</h2>';
                    foreach ($pokemon['types'] as $type) {
                        echo '<span class="fontb">'.$type['type']['name'].'</span>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
            
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