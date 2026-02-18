<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        session()->set('gg_t', bin2hex(random_bytes(16)));

        return view('gogo_predictor', [
            'tk' => session()->get('gg_t')
        ]);
    }
}
