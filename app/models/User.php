<?php

namespace Model;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * User class
 */
class User
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
        'slug',
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
        'password' => [
            'not_less_than_8_chars',
            'same_as_retype_password',
            'required_on_insert',
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

    public function signup($data)
    {
        if($this->validate($data))
        {
            // add extra columns here
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['date'] = date('Y-m-d H:i:s');
            $data['role'] = 'user';
            $data['slug'] =  generate_slug($data['username']);
            $data['image'] = '';

            // check for unique slug
            $num = 0;
            while($num < 100 && $this->first(['slug'=>$data['slug']]))
            {
                $data['slug'] .= rand(0, 9999);
                $num++;
            }

            $this->insert($data);

            message('Profile created successfully! Please login to continue');
            redirect('login');
        }
    }

    public function login($data)
    {
        $row = $this->first([$this->loginUniqueColumn=>$data[$this->loginUniqueColumn]]);

        if($row)
        {
            // confirm password
            if(password_verify($data['password'], $row->password))
            {
                $ses = new Session();
                $ses->auth($row);
                redirect('home');
            } else {
                $this->errors[$this->loginUniqueColumn] = 'Wrong email or password';
            }
        }else {
            $this->errors[$this->loginUniqueColumn] = 'Wrong email or password';
        }

    }
}
