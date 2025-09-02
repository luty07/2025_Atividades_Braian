CREATE DATABASE padaria_paodango;

USE padaria_paodango;

CREATE TABLE Usuarios (
    Id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nome_usuario VARCHAR(100) NOT NULL,
    Email_usuario VARCHAR(100) NOT NULL,
    Telefone_usuario VARCHAR(20) NOT NULL,
    Cargo_usuario VARCHAR(50) NOT NULL,
    CPF_usuario VARCHAR(11) NOT NULL
);

CREATE TABLE Produtos (
    Id_produto INT PRIMARY KEY AUTO_INCREMENT,
    Nome_produto VARCHAR(100) NOT NULL,
    Validade_produto DATETIME NOT NULL,
    Preco_produto DECIMAL(10,2) NOT NULL,
    Estoque_produto INT NOT NULL,
    Id_usuario INT, 
    FOREIGN KEY (Id_usuario) REFERENCES Usuarios(Id_usuario)
);

CREATE TABLE Clientes (
    Id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    Nome_cliente VARCHAR(100) NOT NULL,
    Telefone_cliente VARCHAR(20) NOT NULL,
    CPF_cliente CHAR(11) NOT NULL,
    Endereco_cliente VARCHAR(200) NOT NULL,
    Email_cliente VARCHAR(100) NOT NULL
);

CREATE TABLE Pedidos (
    Id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    Numero_pedido VARCHAR(50) NOT NULL,
    Descricao_pedido TEXT NOT NULL,
    Data_pedido DATETIME NOT NULL,
    Status_pedido VARCHAR(50) NOT NULL,
    Forma_pagamento_pedido VARCHAR(50) NOT NULL,
    Id_cliente INT,
    FOREIGN KEY (Id_cliente) REFERENCES Clientes(Id_cliente)
);

CREATE TABLE Pedido_Produtos (
    Id_pedido INT,
    Id_produto INT,
    Quantidade INT NOT NULL,
    PRIMARY KEY (Id_pedido, Id_produto),
    FOREIGN KEY (Id_pedido) REFERENCES Pedidos(Id_pedido),
    FOREIGN KEY (Id_produto) REFERENCES Produtos(Id_produto)
);
