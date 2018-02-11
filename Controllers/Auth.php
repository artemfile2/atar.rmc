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

                $sql = "SELECT * FROM users WHERE login LIKE :login";
                $queryDb = (new Database())->getDb();
                $query = $queryDb->prepare($sql);
                $query->bindParam(':login', $login);
                $query->execute();
                $user = $query->fetch();

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
        if(count($_POST) > 0) {
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);

            $sql = "SELECT * FROM users WHERE login LIKE :login";
            $queryDb = (new Database())->getDb();
            $query = $queryDb->prepare($sql);
            $query->bindParam(':login', $login);
            $query->execute();
            $user = $query->fetch();

            if($login == $user['login'] && $password == $user['password']) {
                $_SESSION['auth'] = true;

                if(isset($_POST['remember'])) {
                    setcookie('login', $user['login'], time() + 120);
                    setcookie('password', $user['password'], time() + 120);
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
        if($this->params[0] === 'auth' && $this->params[1] === 'logout') {
            unset($_SESSION['auth']);

            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
                setcookie('login', '', time() - 3600);
                setcookie('password', '', time() - 3600);
            }

            header("Location: " . ROOT . 'filial/index');
            exit();
        }
    }
}