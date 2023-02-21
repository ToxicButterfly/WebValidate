<?php
include "autoloader.php";
    if (@$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        $rep = new JSONRepository();
        $user = new User($_POST['login'], $_POST['password'], $_POST['email'], $_POST['name']);
        $err = $rep->save($user);
        echo json_encode($err);
    }