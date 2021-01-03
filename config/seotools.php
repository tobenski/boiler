<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Det Gamle Posthus", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Det gamle Posthus har et klassisk frokostmenukort og et moderne aften menukort. Der er også julefrokost, catering og Mad ud af Huset. Tir-lør fra 11.30', // set false to total remove
            'separator'    => ' | ',
            'keywords'     => ['Restaurant', 'Spisested', 'catering', 'ud af huset', 'mad ud af huset', 'Gourmet', 'Brædstrup', 'Hygge', 'Kaffe', 'Kage', 'Frokost', 'Middag'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => 'none', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => 'cgP0sHhONr24aFvCJ_nyFjeljxR--Wn8XWScHZvJv9E',
            'bing'      => '04759675BC6798F91A9C81C6A9A91D50',
            'alexa'     => null,
            'pinterest' => '6c96031e7b6ff2e78422c46366d9a70d',
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Det Gamle Posthus', // set false to total remove
            'description' => 'Det gamle Posthus har et klassisk frokostmenukort og et moderne aften menukort. Der er også julefrokost, catering og Mad ud af Huset. Tir-lør fra 11.30', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Det Gamle Posthus',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
