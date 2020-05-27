<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

	public function autenticar() {
        $usuario = Container::getModel('Usuario');

        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['pass']));

        $usuario->autenticar();

        if($usuario->__get('id') != '' && $usuario->__get('nome')) {
            session_start();

            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['perfil_id'] = $usuario->__get('perfil_id');
            $_SESSION['nome'] = $usuario->__get('nome');
            $_SESSION['email'] = $usuario->__get('email');

            header('Location: /shop');
        } else {
            header('Location: /login?login=erro');
        }
    }

    public function autenticarCart() {
        session_start();
        $cart = Container::getModel('Cart');
        $cart->__set('id_produto', $_GET['id_produto']);
              
        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /product?id_produto='. $_GET['id_produto'] .'&erro=1');
        } else {
            if(count($cart->getProdutoRepetido()) == 0) {
                header('Location: /produtos_cart?id_produto='. $_GET['id_produto'] .'&quantidade='. $_POST['quantidade']);
            } else {
                header('Location: /product?id_produto='. $_GET['id_produto'] .'&erro=2');
            }
        }
    }

    public function sair() {
        session_start();
        session_destroy();
        header('Location: /');
    }

}


?>