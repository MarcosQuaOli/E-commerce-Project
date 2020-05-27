<?php

    namespace App\Models;
    use MF\Model\Model;

    class Produto extends Model {
        private $id;
        private $img;
        private $nome;
        private $preco;
        private $descricao;
        private $tamanho;
        private $tag;
        private $categoria;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function salvar() {
            $query = "
              insert into produtos(
                img, 
                nome,
                preco,
                descricao,
                tamanho,
                tag,
                categoria)
              values(
                :img, 
                :nome,
                :preco,
                :descricao,
                :tamanho,
                :tag,
                :categoria)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':img', $this->__get('img'));
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':preco', $this->__get('preco')); 
            $stmt->bindValue(':descricao', $this->__get('descricao'));
            $stmt->bindValue(':tamanho', $this->__get('tamanho'));
            $stmt->bindValue(':tag', $this->__get('tag')); 
            $stmt->bindValue(':categoria', $this->__get('categoria'));
            $stmt->execute();

            return $this;
        }   

        public function getAll($order, $show, $page) {
            $select = "select id, img, nome, preco, tamanho, tag, categoria from produtos ";

            $query = $this->filter($select);
            
            $query .= " order by $order limit $page, $show";
            
            $stmt = $this->binding($query);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } 
    
        public function getTotalProdutos() {
            $select = "select count(*) from produtos ";

            $query = $this->filter($select);
            
            $stmt = $this->binding($query);

            return $stmt->fetch(\PDO::FETCH_NUM);
        }

        public function filter($select) {
            $where = array();                       

            if($this->__get('categoria') != '') $where[] = "categoria = :categoria ";
            if($this->__get('tamanho') != '') $where[] = "tamanho = :tamanho ";
            if($this->__get('tag') != '') $where[] = "tag = :tag ";

            if($this->__get('preco') != '') {
                $preco = explode('-', $this->__get('preco'));               

                $where[] = "preco between $preco[0] and $preco[1] ";
            } 

            $query =  $select;

            if(count( $where )) $query .= ' where '.implode( ' and ',$where );

            return $query;
        }

        public function binding($query) {
            $stmt = $this->db->prepare($query);

            if($this->__get('categoria') != '') $stmt->bindValue(':categoria', $this->__get('categoria'));
            if($this->__get('tamanho') != '') $stmt->bindValue(':tamanho', $this->__get('tamanho'));
            if($this->__get('tag') != '') $stmt->bindValue(':tag', $this->__get('tag'));

            $stmt->execute();

            return $stmt;
        }

        public function getProdutoUnico() {
            $query = "
                select 
                    id, 
                    img, 
                    nome,
                    preco,
                    descricao,
                    tamanho,
                    tag,
                    categoria           
                from
                    produtos
                where
                    id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function getProdutoRelacionado() {
            $query = "
                select 
                    id, 
                    img, 
                    nome,
                    preco,
                    tag            
                from
                    produtos
                where
                    tag = :tag
                order by 
                    RAND()
                limit
                    0, 4";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':tag', $this->__get('tag'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

?>