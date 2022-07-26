//connection to the API
function apicon(url) {

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", url, false);
    xmlhttp.send();
    return JSON.parse(xmlhttp.responseText);

}

//render Pokemon car
function renderCards(pokemonarray, poketype) {

    var printnames = "";
    var poketype = "";
    for (const pokemon of pokemonarray) {
        var pokemonimage = pokemon.pokemon.url;
        const newUrlimage = pokemonimage.slice(34, pokemonimage.lastIndexOf('/'));
        var pokemonname = pokemon.pokemon.name;
        var finalurl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" + newUrlimage;
        printnames += '<div class="pokecard"><a href="poke.php/?id=' + pokemonname + '">'
        printnames +=
            '<div class="pokeimagecard"><img class="poke-image" src="' + finalurl + '.png" onerror="imgError(this);" alt="' + pokemonname + '" /></div>';
        printnames += '<div class="pokenamecard">';
        printnames += '<div class="pokeletters">' + pokemonname + '</div>';
        printnames += '</div>';
        printnames += '</div></a></div>';

    }

    document.getElementById("numberpoke-result").innerHTML =
        '<div class="numberpokemons fontb">Number of ' + poketype + ' Pokemons: ' + pokemonarray.length +
        '</div>';
    document.getElementById("pokeresult").innerHTML = '<ul class="pokenames">' + printnames +
        '</ul>';

}

//see all or type
function seeType(ev) {

    ev.prevenetDefault;
    var poketype = this.getAttribute("data-type");

    //all pokemons with limit on knob
    if (poketype == "all") {
        var pokevar = apicon("https://pokeapi.co/api/v2/pokemon?limit=" + knob.value + "&offset=0");
        var arrayfinal = [];
        for (const pokemon of pokevar.results) {
            var currentPokemon = {
                'pokemon': {
                    'name': pokemon.name,
                    'url': pokemon.url
                }
            }
            arrayfinal.push(currentPokemon);

        }

        renderCards(arrayfinal, poketype);
    
    //see type pokemons
    } else {
        var pokevar = apicon("https://pokeapi.co/api/v2/type/" + poketype + "/");
        renderCards(pokevar.pokemon, poketype);
    }

}


var typebuttons = document.getElementsByClassName('buttontype');

for (const button of typebuttons) {

    button.addEventListener('click', seeType, false);
    button.addEventListener('click', function () {
        document.getElementById("numberpoke-result").scrollIntoView();
    });

}
//Ssearch bar. var pokenames is pokenames.json
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
            output += '<div class="pokecard"><a href="poke.php/?id=' + val.name + '">'
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
    $('#numberpoke-result').html('<div class="numberpokemons fontb">Number of  Pokemons: ' + (count - 1) + '</div>');

});

//knob to change the value of the limit when all pokemons mode
knobvalue = knob.value;
$(function () {

    $(".dial").knob({
        'min': 10,
        'max': 1154,
        'step': 5,
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

//if link image is broken    
function imgError(image) {

    image.onerror = "";
    image.src = "./images/imagenotfound.jpg";
    return true;

}


//back to top
mybutton = document.getElementById("backtotop");
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 300) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;

}