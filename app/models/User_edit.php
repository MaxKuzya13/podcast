<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User_edit
{

    use Model;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $loginUniqueColumn = 'email';

    protected $allowedColumns = [

        'firstname',
        'lastname',
        'role',
        'date',
        'username',
        'email',
        'password',
        'bio',
        'image',
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

        'email' => [
            'email',
            'unique',
            'required',
        ],
        'username' => [
            'alpha',
            'required',
        ],
        'firstname' => [
            'alpha',
            'required',
        ],
        'lastname' => [
            'alpha',
            'required',
        ],
    ];
}
