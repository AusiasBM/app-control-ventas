<?php

if (isset($_POST['key']) && $_POST['key'] != ''){

    $key = '1234';

    if ($_POST['key'] == $key){
        session_start();
        $_SESSION['registrado'] = 'ok';

        $http_code = 200;
    }else{
        $http_code = 401;
    }

}else{
    $http_code = 400;
}


