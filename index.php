<?php 
require_once './php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokeapi</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/pokenames.js"></script>
    <script src="./js/jq.js"></script>
</head>

<body id="body">
    <div class="tabs-wrapper">
        <div class="main">
            <form role="form">
                <div class="form-group">
                    <input type="input" class="pokesearchengine" id="pokesearchengine" placeholder="Search ....">
                </div>
            </form>
        </div>

        <a class="button butontype position-popup" href="#info">info</a>

        <?php

        $pcon = new Connection();
        $tcon = $pcon->getConnection('https://pokeapi.co/api/v2/type/');
        $types = json_decode($tcon, true); 
        echo '<div id="types" class="types">';
        echo '<h2 class="card-title"><a class="butontype" href="#poplimit">All with limit</a></h2>';

        foreach ($types['results'] as $type) {
            $id = $type['url'];
            $id = str_replace("https://pokeapi.co/api/v2/type/", "", $id);
            $id = str_replace("/", "", $id);
            echo '<h2 class="card-title"><a data-type="'.$type['name'].'" data-image="'.$type['url'].'" class="buttontype">'.$type['name'].'</a></h2>';
            // echo $type['id'];
        }

        echo '</div>';
    
    ?>
        <div id="height"></div>
        <div id="numberpoke-result"></div>
        <div id="search-result"></div>
        <div id="pokeresult"></div>
    </div>
    <button onclick="topFunction()" id="backtotop" title="Back to top">Top</button>

    <footer class="footer">
        <div class="footer-text">PokeAPI <?php echo date("Y"); ?> © made with 
            <svg xmlns="http://www.w3.org/2000/svg"
                    class="svgfooter" fill=" none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span> 
                by 
            </span>
            <span>
            <a href="https://quexulo.cat" target="_blank" class="underline ml-1">
                quexulo.cat
            </a>
            </span>
            <span class="discord">
                <a target="_blank" href="https://discord.gg/WFhd7BYPs2" class="black">
                    <svg width="15"
                            height="15" viewBox="0 -28.5 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" class="black">
                            <g>
                                <path
                                    d="M216.856339,16.5966031 C200.285002,8.84328665 182.566144,3.2084988 164.041564,0 C161.766523,4.11318106 159.108624,9.64549908 157.276099,14.0464379 C137.583995,11.0849896 118.072967,11.0849896 98.7430163,14.0464379 C96.9108417,9.64549908 94.1925838,4.11318106 91.8971895,0 C73.3526068,3.2084988 55.6133949,8.86399117 39.0420583,16.6376612 C5.61752293,67.146514 -3.4433191,116.400813 1.08711069,164.955721 C23.2560196,181.510915 44.7403634,191.567697 65.8621325,198.148576 C71.0772151,190.971126 75.7283628,183.341335 79.7352139,175.300261 C72.104019,172.400575 64.7949724,168.822202 57.8887866,164.667963 C59.7209612,163.310589 61.5131304,161.891452 63.2445898,160.431257 C105.36741,180.133187 151.134928,180.133187 192.754523,160.431257 C194.506336,161.891452 196.298154,163.310589 198.110326,164.667963 C191.183787,168.842556 183.854737,172.420929 176.223542,175.320965 C180.230393,183.341335 184.861538,190.991831 190.096624,198.16893 C211.238746,191.588051 232.743023,181.531619 254.911949,164.955721 C260.227747,108.668201 245.831087,59.8662432 216.856339,16.5966031 Z M85.4738752,135.09489 C72.8290281,135.09489 62.4592217,123.290155 62.4592217,108.914901 C62.4592217,94.5396472 72.607595,82.7145587 85.4738752,82.7145587 C98.3405064,82.7145587 108.709962,94.5189427 108.488529,108.914901 C108.508531,123.290155 98.3405064,135.09489 85.4738752,135.09489 Z M170.525237,135.09489 C157.88039,135.09489 147.510584,123.290155 147.510584,108.914901 C147.510584,94.5396472 157.658606,82.7145587 170.525237,82.7145587 C183.391518,82.7145587 193.761324,94.5189427 193.539891,108.914901 C193.539891,123.290155 183.391518,135.09489 170.525237,135.09489 Z"
                                    fill="#5865F2" fill-rule="nonzero"></path>
                            </g>
                    </svg>
                </a>
            </span>
        </div>
    </footer>

    <!-- MODALS -->
    <div id="info" class="overlay">
        <div class="popup">
            <h1 class="fontb underline">Pokeapi</h1>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <p>This is a search engine for pokemons conecting with the API (with Javascript and PHP).
                </p>
                <p> You can search by name, by type or by all the pokemons with a knob (jquery) to controll the limit of
                    Pokemons.
                </p>
            </div>
        </div>
    </div>

    <div id="poplimit" class="overlay">
        <div class="popup">
            <h2>Limit</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="climita">
                    <input id="knob" type="text" value="50" class="dial">

                    <a href="#" data-type="all" data-image="all" class="buttontype buttoninside">Limit it</a>
                    <p>limit to control the number of pokemon in all mode</p>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="./js/script.js"></script>

</html>