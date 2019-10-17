<?php

namespace Controllers;

use Models\Users;

class TestController extends Controller
{
    public function form() {
       echo $this->twig->render('form.html',
        [
        ]
      );
    }
    public function receivedata($get,$post,$em) {
      var_dump($post["params"]);
      die('fin');
    }
}