CREATE DATABASE app_help_desk;

CREATE TABLE chamados (
		id_chamado INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		titulo VARCHAR(50) NOT NULL,
		categoria VARCHAR(25) NOT NULL,
		descricao TEXT NOT NULL,
);

CREATE TABLE perfis (
		id_perfil INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		perfil VARCHAR(50) NOT NULL,
);

INSERT INTO perfis(id_perfil, perfil) VALUES (1, 'Administrativo'), (2,'Usuário');

CREATE TABLE usuarios (
		id_usuario INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nome VARCHAR(20) NOT NULL,
		sobrenome VARCHAR(50) NOT NULL,
		email VARCHAR(60) NOT NULL,
        senha VARCHAR(20) NOT NULL,
		id_perfil INT(11) NOT NULL,
        FOREING KEY(id_perfil) REFERENCES perfis(id_perfil)
);