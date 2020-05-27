<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'indexController',
			'action' => 'register'
		);

		$routes['shop'] = array(
			'route' => '/shop',
			'controller' => 'indexController',
			'action' => 'shop'
		);

		$routes['blog_details'] = array(
			'route' => '/blog_details',
			'controller' => 'indexController',
			'action' => 'blogDetails'
		);

		$routes['blog'] = array(
			'route' => '/blog',
			'controller' => 'indexController',
			'action' => 'blog'
		);

		$routes['contact'] = array(
			'route' => '/contact',
			'controller' => 'indexController',
			'action' => 'contact'
		);

		$routes['shopping_cart'] = array(
			'route' => '/shopping_cart',
			'controller' => 'indexController',
			'action' => 'shoppingCart'
		);

		$routes['checkout'] = array(
			'route' => '/checkout',
			'controller' => 'indexController',
			'action' => 'checkout'
		);

		$routes['faq'] = array(
			'route' => '/faq',
			'controller' => 'indexController',
			'action' => 'faq'
		);

		$routes['product'] = array(
			'route' => '/product',
			'controller' => 'indexController',
			'action' => 'product'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes['cadastro'] = array(
			'route' => '/cadastro',
			'controller' => 'indexController',
			'action' => 'cadastro'
		);

		$routes['cadastro_produto'] = array(
			'route' => '/cadastro_produto',
			'controller' => 'indexController',
			'action' => 'cadastroProduto'
		);

		$routes['registrar_produto'] = array(
			'route' => '/registrar_produto',
			'controller' => 'AppController',
			'action' => 'registrarProduto'
		);

		$routes['produtos_cart'] = array(
			'route' => '/produtos_cart',
			'controller' => 'AppController',
			'action' => 'produtosCart'
		);

		$routes['remover_cart'] = array(
			'route' => '/remover_cart',
			'controller' => 'AppController',
			'action' => 'removerCart'
		);

		$routes['comment'] = array(
			'route' => '/comment',
			'controller' => 'AppController',
			'action' => 'comment'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['autenticar_cart'] = array(
			'route' => '/autenticar_cart',
			'controller' => 'AuthController',
			'action' => 'autenticarCart'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$this->setRoutes($routes);
	}

}

?>