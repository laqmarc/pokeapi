// connect to the api
function apicon(url) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url, false);
    xmlhttp.send();
    return JSON.parse(xmlhttp.responseText);
}

//SEE POKEMON
function seePoke(str) {
    if (str.length <= 2) {
        document.getElementById("search-result").innerHTML = "";
        return;
    } else {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            document.getElementById("search-result").innerHTML = this.responseText;
        }

        xmlhttp.open("GET", "https://pokeapi.co/api/v2/pokemon/" + str, true);

        console.log(xmlhttp);
        xmlhttp.send();
    }
}

//RENDER POKEMON CARDx
function render(printnames,pokemonname,finalurl){
    printnames += '<div class="pokecard"><a href="/pokeapi/poke.php/?id=' + pokemonname + '">'
    printnames +=
        '<div class="pokeimagecard"><img class="poke-image" onerror="imgError(this);" src="' + finalurl + '.png" alt="' + pokemonname + '" /></div>';
    printnames += '<div class="pokenamecard">';
    printnames += '<div class="pokeletters">' + pokemonname + '</div>';
    printnames += '</div>';
    printnames += '</div></a></div>';
}

//SEE TYPE
function seeType(ev) {
    // console.log("working");
    ev.prevenetDefault;
    var poketype = this.getAttribute("data-type");
    if (poketype == "all") {
        var pokevar = apicon("https://pokeapi.co/api/v2/pokemon?limit="+knob.value+"&offset=0");
        var printnames = "";
        var numberpoke = pokevar.results.length;
        // console.log(numberpoke);
         let i=-1;
        for (const pokemon of pokevar.results) {
            // console.log(pokevar.results);
            ++i;
            console.log('pokevar: '+pokevar.results[i].url);
            var pokemonimage = pokevar.results[i].url;
            console.log('pokeimatge:' + pokemonimage);
            const newUrlimage = pokemonimage.slice(34, pokemonimage.lastIndexOf('/'));
            console.log('urlimatge:' + newUrlimage);
            var pokemonname = pokevar.results[i].name;
            var finalurl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" + newUrlimage;
    
    
            printnames += '<div class="pokecard"><a href="/pokeapi/poke.php/?id=' + pokemonname + '">'
            printnames +=
                '<div class="pokeimagecard"><img class="poke-image"   src="' + finalurl + '.png" onerror="imgError(this);" alt="' + pokemonname + '" /></div>';
            printnames += '<div class="pokenamecard">';
            printnames += '<div class="pokeletters">' + pokemonname + '</div>';
            printnames += '</div>';
            printnames += '</div></a></div>';
    
            render(printnames,pokemonname,finalurl);
            console.log(render);
        }

    } else{
        var pokevar = apicon("https://pokeapi.co/api/v2/type/" + poketype + "/");
        var printnames = "";
        var numberpoke = pokevar.pokemon.length;
        for (const pokemon of pokevar.pokemon) {
            var pokemonimage = pokemon.pokemon.url;
            const newUrlimage = pokemonimage.slice(34, pokemonimage.lastIndexOf('/'));
            var pokemonname = pokemon.pokemon.name;
            var finalurl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" + newUrlimage;
    
    
            printnames += '<div class="pokecard"><a href="/pokeapi/poke.php/?id=' + pokemonname + '">'
            printnames +=
                '<div class="pokeimagecard"><img class="poke-image" src="' + finalurl + '.png" onerror="imgError(this);" alt="' + pokemonname + '" /></div>';
            printnames += '<div class="pokenamecard">';
            printnames += '<div class="pokeletters">' + pokemonname + '</div>';
            printnames += '</div>';
            printnames += '</div></a></div>';
    
    
        }
    }

    document.getElementById("numberpoke-result").innerHTML =
        '<div class="numberpokemons fontb">Number of ' + poketype + ' Pokemons: ' + numberpoke +
        '</div>';
    document.getElementById("pokeresult").innerHTML = '<ul class="pokenames">' + printnames +
        '</ul>';


}


var typebuttons = document.getElementsByClassName('buttontype');

for (const button of typebuttons) {
    button.addEventListener('click', seeType, false);
    button.addEventListener('click', function () {
        document.getElementById("numberpoke-result").scrollIntoView();
    });

}
//SEARCH JQUERY
$('#pokesearchengine').keyup(function () {
    var searchField = $(this).val();
    if (searchField === '') {
        $('#pokeresult').html('');
        return;
    }
    var regex = new RegExp(searchField, "i");
    var output = '';
    var count = 1;
    $.each(pokenames, function (key, val) {
        if ((val.name.search(regex) != -1)) {
            output += '<div class="pokecard"><a href="/pokeapi/poke.php/?id=' + val.name + '">'
            output +=
                '<div class="pokeimagecard"><img class="poke-image" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/' +
                val.image + '"  onerror="imgError(this);" alt="' + val.name + '" /></div>';
            output += '<div class="pokenamecard">';
            output += '<div class="pokeletters">' + val.name + '</div>';
            output += '</div>';
            output += '</div>';
            if (count % 2 == 0) {
                output += '</a></div>'
            }
            count++;
        }
    });
    output += '</div>';
    $('#pokeresult').html(output);
});

//knob
knobvalue = knob.value;
    $(function() {
        $(".dial").knob({
            'min':30,
            'max':1154,
            'step':10,
            'fgcolor': "#000000",
            'bgcolor': "#ffffff",
            'thickness': 0.4,
            'inputColor': '#000000',
            'font': 'pokemon',
            'fontWeight': 'bold',
            'fontSize': '30px',
            'displayInput': true,
            'width': '100%',
            'height': '60%',


        })
    });

    function imgError(image) {
        image.onerror = "";
        image.src = "./images/imagenotfound.jpg";
        return true;
    }
