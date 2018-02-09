<?php

namespace Controllers;

use Models\Database;
use Models\System;

class Auth extends Client
{

    public function check(){
        if(!isset($_SESSION['auth'])) {
            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                $login = trim($_COOKIE['login']);
                $password = trim($_COOKIE['password']);

                if($login == 'client' && $password == md5('123456')) {
                    $_SESSION['auth'] = true;
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return true;
        }

        /*$sql = "SELECT * FROM users WHERE login LIKE :login";
        $queryDb = (new Database())->getDb();
        $query = $queryDb->prepare($sql);
        $query->bindParam(':login', $login);
        $query->execute();*/
    }

    public function action_login(){
        echo var_dump($_POST);
        if(count($_POST) > 0) {
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);

            if($login == 'client' && $password == '123456') {
                $_SESSION['auth'] = true;

                if(isset($_POST['remember'])) {
                    setcookie('login', 'client', time() + 3600 * 24 * 7);
                    setcookie('password', md5('123456'), time() + 3600 * 24 * 7);
                }

                header("Location: " . ROOT . 'filial/index');
                exit();
            }
            else {
                $this->msg = 'Неверный логин или пароль!';
            }
        }

        $this->title = 'Авторизация';

        $this->content = System::template('v_login.php', [
            'msg' => $this->msg,
            ]);
    }

    public function logout(){
        if($this->params[0] === 'authorization' && $this->params[1] === 'logout') {
            unset($_SESSION['auth']);

            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                setcookie('login', '', time() - 3600);
                setcookie('password', '', time() - 3600);
            }

            header("Location: " . ROOT . 'articles');
            exit();
        }
    }
}