<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public $make;
    public $model;
    public $country;
    public $county;
    public $dealer;
    public $feature;
    public $type;
    public $vehicle;
    public $role;
    public $user;
    public $auth;
    public $yard;
    public $price;
    public $partner;
    protected $subscription;
    protected $subsprop;
    protected $maillist;
    protected $service;
    protected $vehicleservice;
    protected $quote;
    protected $finance;
    protected $tradein;
    protected $account;
    protected $payment;
    protected $loanproduct;

    public function checksubscription()
    {

    }

}
