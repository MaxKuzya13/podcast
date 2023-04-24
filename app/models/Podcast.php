<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Podcast class
 */
class Podcast
{

    use Model;

    protected $table = 'podcasts';
    protected $primaryKey = 'id';
    protected $loginUniqueColumn = 'slug';

    protected $allowedColumns = [

        'title',
        'description',
        'user_id',
        'date',
        'views',
        'popularity',
        'slug',
        'image',
        'file',
    ];

//    /***********
//     *   rules include:
//     * required
//     * alpha
//     * email
//     * numeric
//     * unique
//     * symbol
//     * longer_than_8_chars
//     * alpha_space
//     * alpha_numeric
//     * alpha_numeric_symbol
//     * alpha_symbol
//     *
//     *
//     */
    protected $validationRules = [

        'title' => [
            'alpha_numeric_symbol',
            'required',
        ],


    ];


}
