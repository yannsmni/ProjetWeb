<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/accueil' => [[['_route' => 'accueil', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/evenements/accueil' => [[['_route' => 'evenements', '_controller' => 'App\\Controller\\EventsController::index'], null, null, null, false, false, null]],
        '/evenements/tous' => [[['_route' => 'evenementsAll', '_controller' => 'App\\Controller\\EventsController::all'], null, null, null, false, false, null]],
        '/evenements/mois' => [[['_route' => 'evenementsMois', '_controller' => 'App\\Controller\\EventsController::month'], null, null, null, false, false, null]],
        '/evenements/mes_evenements' => [[['_route' => 'evenementsPerso', '_controller' => 'App\\Controller\\EventsController::my'], null, null, null, false, false, null]],
        '/boutique/accueil' => [[['_route' => 'boutique/accueil', '_controller' => 'App\\Controller\\ShopController::index'], null, null, null, false, false, null]],
        '/boutique/tshirts' => [[['_route' => 'boutique/categorie/tshirts', '_controller' => 'App\\Controller\\ShopController::tshirts'], null, null, null, false, false, null]],
        '/boutique/pulls' => [[['_route' => 'boutique/categorie/pulls', '_controller' => 'App\\Controller\\ShopController::pulls'], null, null, null, false, false, null]],
        '/boutique/goodies' => [[['_route' => 'boutique/categorie/goodies', '_controller' => 'App\\Controller\\ShopController::goodies'], null, null, null, false, false, null]],
        '/autres' => [[['_route' => 'boutique/categorie/autres', '_controller' => 'App\\Controller\\ShopController::autres'], null, null, null, false, false, null]],
        '/photos' => [[['_route' => 'photos', '_controller' => 'App\\Controller\\PhotosController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
