# pokeapi

Pokeapi v0.1

Pokeapi és un aplicatiu per consultar l'API de Pokemon.

Jo sóc de PHP però tenia ganes de provar els meus límits amb Javascript.

A [NEWE](https://nuwe.io/challenge/repte-4-utilitzar-api) es proposava per al repte l'ús de React, Angular o Vue.js. Jo estic fent el curs de PHP, tot i això, tenia ganes d'investigar els meus límits amb Javascript.

## Us

La meva versió de la Pokeapi té un buscador general que llegeix d'un json els 1154 noms i id dels Pokemons en forma de caché per poder fer una "live search". 

També et permet veure tots els pokemons, al clicar el botó "All with limit", s'obre un popup que té un knob que limita el número de Pokemons a escollir del total.

També pots llistar pel tipus de Pokemons que existeixen on, al clicar el botó corresponent al tipus,  t'apareixen tots els de la tipologia demanada. 

No totes les fotos apareixen i he posat una foto genérica quan això passa.

Un cop cliques a una carta, t'apareix tota la informació del Pokemon en qüestió. Connectant a /pokemon, /pokemon-species i /generation.

## Tecnologies

He utilitzat PHP, Javascript, Jquery pel límit del Knob i pel buscador.

Les vistes estan pensades per a desktop, tablet i telèfons, adaptant les vistes a cada dispositiu.

## Contribucions

El codi ha de ser lliure: pull request, forks, clones i descarregues són benvingudes.

## TODO en futures versions

Per a la versió 0.2

1- Implementar un "next page" al buscador amb límit i offset a forma de paginació. [pagination](https://pokeapi.co/docs/v2#resource-listspagination-section)

2- A la pàgina d'informació del Pokemon, veure l'evolució del Pokemon en qüestió amb desplegables per poder visulitzar la informació bàsica del Pokemon amb un "hover" i poder anar a la fitxa. 
També una animacó de l'evolució fent "morphing" als svg's amb la llibreria [snapsvg](http://snapsvg.io/). 

3- Que el buscador funcioni amb totes les tipologies de cerca.

Per a la versió 0.3

1- Interactuar quan estigui operativa la versió de l'API amb [graphql] (https://pokeapi.co/docs/graphql).

Per a més versions, el futur ja dirà.

## Projecte online

[pokeapi.quexulo.cat](https://pokeapi.quexulo.cat/)

## Licence

Public domain.
