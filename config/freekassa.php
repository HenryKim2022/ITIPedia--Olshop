<?php

return [

    /*
     * Project`s id
     */
    'project_id' => env('FREEKASSA_PROJECT_ID', '37462'),

    /*
     * First project`s secret key
     */
    'secret_key' => env('FREEKASSA_SECRET_KEY', 'c{=m-bJ[9(.%U&4'),

    /*
     * Second project`s secret key
     */
    'secret_key_second' => env('FREEKASSA_SECRET_KEY_SECOND', 'xK$emJHkjzLCmxJ'),

    /*
     * Locale for payment form
     */
    'locale' => 'ru',  // ru || en

    /*
     * Allowed currenc'ies https://www.free-kassa.ru/docs/api.php#ex_currencies
     *
     * If currency = null, that parameter doesn`t be setted
     */
    'currency' => null,

    /*
     * Allowed ip's https://www.free-kassa.ru/docs/api.php#step3
     */
    'allowed_ips' => [
        '136.243.38.147',
        '136.243.38.149',
        '136.243.38.150',
        '136.243.38.151',
        '136.243.38.189',
        '88.198.88.98',
        '136.243.38.108',
        '118.179.52.3'
    ],

    /*
     *  SearchOrder
     *  Search order in the database and return order details
     *  Must return array with:
     *
     *  _orderStatus
     *  _orderSum
     */
    'searchOrder' => 'App\Http\Controllers\Backend\Payments\FreeKassa\FreeKassaController@searchOrder', //  '',

    /*
     *  PaidOrder
     *  If current _orderStatus from DB != paid then call PaidOrderFilter
     *  update order into DB & other actions
     */
    'paidOrder' => 'App\Http\Controllers\Backend\Payments\FreeKassa\FreeKassaController@paidOrder', //  '',

    /*
     * Customize error messages
     */
    'errors' => [
        'validateOrderFromHandle' => 'Validate Order Error',
        'searchOrder' => 'Search Order Error',
        'paidOrder' => 'Paid Order Error',
    ],

    /*
     * Url to init payment on FreeKassa
     * https://www.free-kassa.ru/docs/api.php#step2
     */
    'pay_url' => 'http://www.free-kassa.ru/merchant/cash.php',
];
