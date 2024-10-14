<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class IndexController extends Controller
{
    public function callHome(){
        $welcome = 'THIS IS MY NFT MUSIC CRUD, SAVE YOUR PFP AS A NFT';
        $name = 'Arthur';
        $bandInfo = $this->getBandaInfo();
        $siteInfo = $this->getSiteInfo();

        

        return view('general.home',compact('welcome','name', 'bandInfo', 'siteInfo'));
    }


    protected function getBandaInfo(){
         return $bandInfo = [
            ['id'=>1, 'name' => 'Guns n Roses','genre' => 'Rock'],
            ['id'=>2, 'name' => 'Iron Maiden','genre' => 'Rock'],
            ['id'=>3, 'name' => 'Metalica','genre' => 'Rock']
        ];
    }

    private function getSiteInfo(){
         return $siteInfo = [
            'name' =>'CRUD De Bandas',
            'address'=> 'ONLINE',
            'email'=> 'TutuBrabox@gmail.com'
        ];
    }
}
