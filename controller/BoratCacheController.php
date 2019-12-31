<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\DB;

class BoratCacheController extends Controller
{

    public function clear()
    {
        $validation = $this->validate($this->request, [

        ]);

        $this->addMessage('success', 'cache cleaned');

        return $this->getResponse();
    }
}
