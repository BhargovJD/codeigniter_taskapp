<?php

if(! function_exists('current_user')){

    function current_user(){
        // $auth = new \App\Libraries\Authentication;
        $auth = service('auth');

        return $auth->getCurrentUser();
    }
}


?>