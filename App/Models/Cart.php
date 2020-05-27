<?php

  namespace App\Models;
  use MF\Model\Model;

  class Cart extends Model {
    private $id;
    private $id_usuario;
    private $id_produto;
    private $quantidade;

    public function __get($atributo) {
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function salvarCart() {
      $query = "
        insert into produtos_cart
          (id_usuario, id_produto, quantidade)
        values
          (:id_usuario, :id_produto, :quantidade)";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->bindValue(':id_produto', $this->__get('id_produto'));
      $stmt->bindValue(':quantidade', $this->__get('quantidade'));
      $stmt->execute();

      return true;
    }

    public function getProdutoRepetido() {
      $query = "select id_produto from produtos_cart where id_produto = :id_produto";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_produto', $this->__get('id_produto'));
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getProdutosCart() {
      $query = "
        select
          pc.id_produto,
          p.img, 
          p.nome, 
          p.preco, 
          pc.quantidade
        from
          produtos as p
          right join produtos_cart as pc on(p.id = pc.id_produto)
        where 
          pc.id_usuario = :id_usuario";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->execute();

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function removerCart() {
      $query = "delete from produtos_cart where id_produto = :id_produto and id_usuario = :id_usuario";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_produto', $this->__get('id_produto'));
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));      
      $stmt->execute();

      return true;
    }
  }      
?>