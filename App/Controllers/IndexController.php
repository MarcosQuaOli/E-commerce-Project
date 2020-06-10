<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {		
		$this->validaAutenticacao();

		$this->render('index');
	}

	public function login() {
		$this->validaAutenticacao();

		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';

		$this->render('login');
	}

	public function register() {
		$this->validaAutenticacao();
		$this->view->erroCadastro = false;

		$this->render('register');
	}

	public function shop() {
		$this->validaAutenticacao();

		$produto = Container::getModel('Produto');		

		if(isset($_POST['sort'])) {
			$this->view->sort = $_POST['sort'];
		} else if(isset($_GET['sort'])){			
			$this->view->sort = $_GET['sort'];
		}	else {
			$this->view->sort = '';
		}

		if(isset($_POST['show'])) {
			$this->view->show = $_POST['show'];
		} else if(isset($_GET['show'])){			
			$this->view->show = $_GET['show'];
		}	else {			
			$this->view->show = '5';
		}

		if($this->view->sort == 'high_price') {
			$order = 'preco desc';
		} else if($this->view->sort == 'low_price') {
			$order = 'preco asc';
		} else {
			$order = 'rand()';
		}

		isset($_GET['page']) ? $this->view->num_page = $_GET['page'] : $this->view->num_page = 0;

		isset($_GET['left']) ? $this->view->left = $_GET['left'] : $this->view->left = 0;

		if(isset($_GET['categoria'])) {
			$this->view->categoria = $_GET['categoria'];
			$produto->__set('categoria', $this->view->categoria);
		} else {
			$this->view->categoria = '';
		}

		if(isset($_GET['tamanho'])) {
			$this->view->tamanho = $_GET['tamanho'];
			$produto->__set('tamanho', $this->view->tamanho);
		} else {
			$this->view->tamanho = '';
		}

		if(isset($_GET['tag'])) {
			$this->view->tag = $_GET['tag'];
			$produto->__set('tag', $this->view->tag);
		} else {
			$this->view->tag = '';
		}

		if(isset($_POST['min']) && isset($_POST['max'])) {
			$this->view->preco = $_POST['min'] . " - " .$_POST['max'];

			$produto->__set('preco', $this->view->preco);
		} else if(isset($_GET['preco'])){		
			$this->view->preco = $_GET['preco'];
			
			$produto->__set('preco', $_GET['preco']);	
		}	else {			
			$this->view->preco = '';
		}
		
		$this->view->produtos = $produto->getAll($order, $this->view->show, $this->view->num_page);

		$this->view->total_produtos = $produto->getTotalProdutos();

		$this->render('shop');
	}

	public function product() {
		$this->validaAutenticacao();
		$produto = Container::getModel('Produto');
		$comment = Container::getModel('Comment');

		$produto->__set('id', $_GET['id_produto']);
		$comment->__set('id_produto', $_GET['id_produto']);
		
		$this->view->produto_unico = $produto->getProdutoUnico();

		$produto->__set('tag', $this->view->produto_unico['tag']);

		$this->view->produto_relacionado = $produto->getProdutoRelacionado();

		$this->view->comments = $comment->getComment();

		$this->render('product');
	}

	public function shoppingCart() {
		$this->validaAutenticacao();
		$cart = Container::getModel('Cart');

		if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
			$this->view->produtos_cart = '';
		} else {		

			$cart->__set('id_usuario', $_SESSION['id']);

			$this->view->produtos_cart = $cart->getProdutosCart();

		}
			
		$this->render('shopping_cart');
	}

	public function blogDetails() {
		$this->validaAutenticacao();

		$this->render('blog_details');
	}

	public function blog() {
		$this->validaAutenticacao();
		$this->render('blog');
	}

	public function contact() {
		$this->validaAutenticacao();
		$this->render('contact');
	}

	public function checkout() {
		$this->validaAutenticacao();

		$cart = Container::getModel('Cart');

		if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
			$this->view->produtos_cart = '';
		} else {		

			$cart->__set('id_usuario', $_SESSION['id']);
			$this->view->produtos_cart = $cart->getProdutosCart();

		}

		$this->render('checkout');
	}

	public function faq() {
		$this->validaAutenticacao();
		$this->render('faq');
	}

	public function registrar() {		
		$this->validaAutenticacao();
		if($_POST['pass'] == $_POST['re-pass'] && strlen($_POST['pass']) > 3) {
			$usuario = Container::getModel('Usuario');

			$usuario->__set('nome', $_POST['nome']);
			$usuario->__set('email', $_POST['email']);
			$usuario->__set('senha', md5($_POST['pass']));			

			if($usuario->validarCadastro() && count($usuario->getEmailRepetido()) == 0) {				
				$usuario->salvar();
	
				$this->render('cadastro');
			} else {

				$this->view->erroCadastro = true;
				$this->render('register');

			}
		} else {

			$this->view->erroCadastro = true;
			$this->render('register');

		}
	}
	
	public function validaAutenticacao() {
		session_start();

    $this->view->autentica = true;

    if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
        $this->view->autentica = false;
    }
	}
}


?>