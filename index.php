<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeapi</title>
    <link rel="stylesheet" href="/pokeapi/css/style.css">
    <script src="/pokeapi/js/pokenames.js"></script>
    <script src="/pokeapi/js/jq.js"></script>
</head>

<body>


    <div class="top">
        <a href="/">
            <h1 class="c fontb">Apipoke Search</h1>
        </a>
    </div>
    <!-- TABS -->
    <div class="tabs-wrapper">
    <div class="main">
        <form role="form">
            <div class="form-group">
                <input type="input" class="pokesearchengine" id="pokesearchengine"
                    placeholder="Find your Pokemon here .... or by type ↓">
            </div>
        </form>   
    </div>

	<a class="button butontype position-popup" href="#info">info</a>

    <div id="info" class="overlay">
        <div class="popup">
            <h2>Apipoke info</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <p>This is a search engine for pokemons conecting with the API (with Js and PHP to try the conections).</p>
                <p> You can search by name, by type or by all the pokemons with a knob (jquery) to controll the limit. </p>
            </div>
        </div>
    </div>

        <?php
        require_once '../pokeapi/php/connection.php';


                $pcon = new Connection();
                $tcon = $pcon->getConnection('https://pokeapi.co/api/v2/type/');
                $types = json_decode($tcon, true); 

                echo '<div id="types" class="types">';
                echo '<a data-type="all" data-image="all"   class="buttontype card-title button">All</a></h2>';
                echo '<div class="climit">   <input id="knob" type="text" value="50" class="dial"><div class="limit">limit</div></div></div>';

                echo '<div id="types" class="types">';

                foreach ($types['results'] as $type) {
                    $id = $type['url'];
                    $id = str_replace("https://pokeapi.co/api/v2/type/", "", $id);
                    $id = str_replace("/", "", $id);
                    
                    
                    echo '<h2 class="card-title"><a data-type="'.$type['name'].'" data-image="'.$type['url'].'"   class="buttontype">'.$type['name'].'</a></h2>';
                    // echo $type['id'];
                }

                echo '</div>';
                //END TYPES OF POKEMONS	
           
?>

        <div id="numberpoke-result"></div>
        <div id="search-result"></div>
        <div id="pokeresult"></div>



    </div>

          
<footer class="footer">
    <div class="footer-text">PokeAPI <?php echo date("Y"); ?> © made with <svg
            xmlns="http://www.w3.org/2000/svg" class="svgfooter" fill=" none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg><span> by </span><a href="https://quexulo.cat" target="_blank" class="underline ml-1"> quexulo.cat</a>
        <!-- <a class="discord" href="https://discord.gg/WFhd7BYPs2">DISCORD</a> -->
    </div>
             
</footer>

</body>
<!-- //link to js file -->
<script src="./js/script.js"></script>

</html>





