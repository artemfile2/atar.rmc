<?php

namespace controllers;

use core\database;
use core\system;
use helpers\checkString;

class auth extends client
{

    public function check(){
        if(!isset($_SESSION['auth'])) {
            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                $login = checkString::clean($_COOKIE['login']);
                $password = checkString::clean($_COOKIE['password']);

                $user = (new database())
                    ->select("SELECT * FROM users WHERE login = :login",
                        ['login' => $login],
                        1);
                echo 'check' . var_dump($user);

                if($login == $user['login'] && $password == $user['password']) {
                    $_SESSION['auth'] = true;
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return true;
        }

    }

    public function action_login(){
        $login = checkString::clean($_POST['login']);
        $password = checkString::clean($_POST['password']);

        if(isset($login) && !empty($login)
            && isset($password) && !empty($password)) {

            $user = (new database())
                ->select("SELECT * FROM users WHERE login = :login",
                    ['login' => $login],
                    1);

            if($login == $user['login'] && $password == $user['password']) {
                $_SESSION['auth'] = true;
                $_SESSION['userName'] = $login;

                if(isset($_POST['remember'])) {

                    //todo реализовать шифрование пароля
                    setcookie('login', $user['login'], time() + 3600);
                    setcookie('password', $user['password'], time() + 3600);
                }

                header("Location: " . ROOT . 'filial/index');
                exit();
            }
            else {
                $this->msg = 'Неверный логин или пароль!';
            }
        }

        $this->title = 'Авторизация';

        $this->content = system::template('v_login.php', [
            'msg' => $this->msg,
            ]);
    }

    public function action_logout(){
        if($this->params[0] === 'auth' && $this->params[1] === 'logout') {
            unset($_SESSION['auth']);
            unset($_SESSION['userName']);

            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                setcookie('login', '', time() - 3600);
                setcookie('password', '', time() - 3600);
            }

            header("Location: " . ROOT . 'filial/index');
            exit();
        }
    }
}