<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $register = [
        'name' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'address' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'min_length[8]|alpha_numeric_punct'
    ];
        
    public $register_errors = [
        'name' => [
            'required' => 'Harap masukan nama!'
            ],
        'dob' => [
            'required' => 'Harap masukan tanggal lahir!'
            ],
        'gender' => [
            'required' => 'Harap masukan jenis kelamin!'
            ],
        'address' => [
            'required' => 'Harap masukan alamat!'
            ],
        'email' => [
            'required' => 'Harap masukan email!',
            'valid_email' => 'Harap masukan email dengan benar!',
            'is_unique' => 'Email sudah dipakai'
            ],
        'password' => [
            'min_length' => 'Password harus terdiri dari 8 kata',
            'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ]
    ];
}
