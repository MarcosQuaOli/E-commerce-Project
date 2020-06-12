<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {  	

	public function produtosCart() {
		session_start();

		$cart = Container::getModel('Cart');

		$cart->__set('id_produto', $_GET['id_produto']);
		$cart->__set('id_usuario', $_SESSION['id']);
		$cart->__set('quantidade', $_GET['quantidade']);
		$cart->salvarCart();

		header('Location: /shopping_cart');

	}

	public function removerCart() {
		session_start();

		$cart = Container::getModel('Cart');

		$cart->__set('id_produto', $_GET['id_produto']);
		$cart->__set('id_usuario', $_SESSION['id']);
		$cart->removerCart();

		header('Location: /shopping_cart');
	}

	public function comment() {
		session_start();

		if(isset($_SESSION['id'])) {
			$comment = Container::getModel('Comment');

			$comment->__set('id_usuario', $_SESSION['id']);
			$comment->__set('id_produto', $_GET['id_produto']);
			$comment->__set('texto', $_POST['texto']);

			$comment->comentar();

			header('Location: /product?id_produto='.$_GET['id_produto']);
		} else {
			header('Location: /product?erro_comment=true&id_produto='.$_GET['id_produto']);
		}
	}

}


?>