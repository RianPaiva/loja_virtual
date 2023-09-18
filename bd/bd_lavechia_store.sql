CREATE DATABASE bd_lavechia_store;
USE bd_lavechia_store;

CREATE TABLE tb_adm ( 
id_adm INT(11) NOT NULL AUTO_INCREMENT,
nome VARCHAR(80) NOT NULL,
email VARCHAR(80) NOT NULL UNIQUE,
senha VARCHAR(32) NOT NULL,
`status` tinyint(1) NOT NULL DEFAULT '0',
PRIMARY KEY (id_adm)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*SELECT * FROM tb_clientes*/


CREATE TABLE tb_fornecedor(
id_fornecedor INT(11) NOT NULL AUTO_INCREMENT,
razao_social VARCHAR(100) NOT NULL,
cnpj VARCHAR(14) NOT NULL UNIQUE,
num_endereco INT(11) NOT NULL,
telefone VARCHAR(13) NOT NULL,
email VARCHAR(80) NOT NULL,
`status` tinyint(1) NOT NULL DEFAULT '0',
logradouro VARCHAR(80) NOT NULL,
cidade VARCHAR(80) NOT NULL,
estado CHAR(2) NOT NULL,
complemento VARCHAR(80) NOT NULL,
pais VARCHAR(50) NOT NULL,|
PRIMARY KEY (id_fornecedor)
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;

/*SELECT * FROM tb_item_estoque*/

CREATE TABLE tb_produto (
id_produto INT(11) NOT NULL AUTO_INCREMENT,
descricao VARCHAR(100) NOT NULL,
id_fornecedor INT(11) NOT NULL,
PRIMARY KEY (id_produto), 
FOREIGN KEY (id_fornecedor) REFERENCES tb_fornecedor(id_fornecedor)
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;  
 

CREATE TABLE tb_item_estoque (
id_produto INT(11) NOT NULL AUTO_INCREMENT,
valor_compra REAL(10,2) NOT NULL,
dt_hr_entrada TIMESTAMP NOT NULL,
qtd_disponivel INT(11) NOT NULL DEFAULT '0',
PRIMARY KEY (id_produto)
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;

CREATE TABLE tb_cliente (
id_cliente INT(11) NOT NULL AUTO_INCREMENT,
nome VARCHAR(20) NOT NULL,
sobrenome VARCHAR(60) NOT NULL,
cpf VARCHAR(11) NOT NULL UNIQUE,
celular VARCHAR(13) NOT NULL,
telefone VARCHAR(13),
email VARCHAR(80) NOT NULL UNIQUE,
senha VARCHAR(32) NOT NULL,
PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;  


CREATE TABLE tb_pedido (
id_pedido INT(11) NOT NULL AUTO_INCREMENT,
id_cliente INT(11) NOT NULL,
preco_total REAL(10,2) NOT NULL,
data_pedido TIMESTAMP NOT NULL,
status_pagamento TINYINT(1) NOT NULL DEFAULT '0',
PRIMARY KEY (id_pedido),
FOREIGN KEY (id_cliente) REFERENCES tb_cliente(id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=LATIN1;


CREATE TABLE tb_item_pedido (
id_pedido INT(11) NOT NULL,
id_produto INT(11) NOT NULL,
valor_venda REAL(10,2) NOT NULL,
PRIMARY KEY (id_pedido, id_produto),
FOREIGN KEY (id_pedido) REFERENCES tb_pedido(id_pedido),
FOREIGN KEY (id_produto) REFERENCES tb_produto(id_produto)
)ENGINE=InnoDB DEFAULT CHARSET=LATIN1;

DROP TABLE tb_item_estoque
DROP TABLE tb_item_pedido
bd_lavechia_store

