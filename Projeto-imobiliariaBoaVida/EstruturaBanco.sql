CREATE TABLE imovel (
id int(4) PRIMARY KEY auto_increment,
descricao VARCHAR(200),
foto longblob,
valor DECIMAL(9,2),
tipo CHAR(1),
fotoTipo VARCHAR(20),
path VARCHAR(50)
);

CREATE TABLE usuario (
id int(4) PRIMARY KEY auto_increment,
login VARCHAR(10),
senha VARCHAR(100),
permissao CHAR(1) 
);

CREATE TABLE imagens (
id int(4) PRIMARY KEY auto_increment,
idImovel int(4),
foto longblob,
fotoTipo VARCHAR(20),
pathadd VARCHAR(50)
);
