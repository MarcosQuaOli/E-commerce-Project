<?php

  namespace App\Models;
  use MF\Model\Model;

  class Comment extends Model {
    private $id;
    private $id_usuario;
    private $id_produto;
    private $texto;
    private $data_comment;

    public function __get($atributo) {
      return $this->$atributo;
    }

    public function __set($atributo, $valor) {
      $this->$atributo = $valor;
    }

    public function comentar() {
      $query = "
        insert into comments
          (id_usuario, id_produto, texto)
        values
          (:id_usuario, :id_produto, :texto)";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->bindValue(':id_produto', $this->__get('id_produto'));
      $stmt->bindValue(':texto', $this->__get('texto'));
      $stmt->execute();

      return true;
    }

    public function getComment() {
      $query = "
        select 
          c.texto, c.data_comment, u.nome
        from 
          comments as c
            left join produtos as p on(c.id_produto = p.id)
            left join usuarios as u on(c.id_usuario = u.id)
        WHERE	
          c.id_produto = :id_produto";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_produto', $this->__get('id_produto'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /*

    

    */
    
  }      
?>