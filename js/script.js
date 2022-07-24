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
        xmlhttp.send();
    }

}

//RENDER POKEMON CARDx
function renderCards(printnames, pokemonname, finalurl, newUrlimage) {

    var finalurl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" + newUrlimage;
    printnames += '<div class="pokecard"><a href="poke.php/?id=' + pokemonname + '">'
    printnames +=
        '<div class="pokeimagecard"><img class="poke-image"   src="' + finalurl + '.png" onerror="imgError(this);" alt="' + pokemonname + '" /></div>';
    printnames += '<div class="pokenamecard">';
    printnames += '<div class="pokeletters">' + pokemonname + '</div>';
    printnames += '</div>';
    printnames += '</div></a></div>';
    

}

//SEE TYPE
function seeType(ev) {

    ev.prevenetDefault;
    var poketype = this.getAttribute("data-type");

    //all pokemons with limit on knob
    if (poketype == "all") {
        var pokevar = apicon("https://pokeapi.co/api/v2/pokemon?limit=" + knob.value + "&offset=0");
        var printnames = "";
        var numberpoke = pokevar.results.length;
        let i = -1;

        for (const pokemon of pokevar.results) {
            ++i;
            var pokemonimage = pokevar.results[i].url;
            const newUrlimage = pokemonimage.slice(34, pokemonimage.lastIndexOf('/'));
            var pokemonname = pokevar.results[i].name;

            // CAN BE RENDERED            
            var finalurl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" + newUrlimage;
            printnames += '<div class="pokecard"><a href="poke.php/?id=' + pokemonname + '">'
            printnames +=
                '<div class="pokeimagecard"><img class="poke-image"   src="' + finalurl + '.png" onerror="imgError(this);" alt="' + pokemonname + '" /></div>';
            printnames += '<div class="pokenamecard">';
            printnames += '<div class="pokeletters">' + pokemonname + '</div>';
            printnames += '</div>';
            printnames += '</div></a></div>';
            // renderCards(printnames, pokemonname, finalurl,newUrlimage);

            //FINISH RENDER
        }

    } else {

        //types of pokemons
        var pokevar = apicon("https://pokeapi.co/api/v2/type/" + poketype + "/");
        var printnames = "";
        var numberpoke = pokevar.pokemon.length;
        for (const pokemon of pokevar.pokemon) {
            var pokemonimage = pokemon.pokemon.url;
            const newUrlimage = pokemonimage.slice(34, pokemonimage.lastIndexOf('/'));
            var pokemonname = pokemon.pokemon.name;

            // CAN BE RENDERED
            var finalurl = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/" + newUrlimage;
            printnames += '<div class="pokecard"><a href="poke.php/?id=' + pokemonname + '">'
            printnames +=
                '<div class="pokeimagecard"><img class="poke-image" src="' + finalurl + '.png" onerror="imgError(this);" alt="' + pokemonname + '" /></div>';
            printnames += '<div class="pokenamecard">';
            printnames += '<div class="pokeletters">' + pokemonname + '</div>';
            printnames += '</div>';
            printnames += '</div></a></div>';
            //FINISH RENDER
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
//pokenames is a json
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

});

//knob to change the value of the limit when all pokemons
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
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop >300) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 

}