CREATE DATABASE IF NOT EXISTS sistema_ferroviario_astral_express;

USE sistema_ferroviario_astral_express;

CREATE TABLE
    usuario (
        id_usuario INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(100) NOT NULL,
        usuario VARCHAR(45) UNIQUE NOT NULL,
        senha VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        perfil ENUM ('admin', 'funcionario') DEFAULT 'funcionario',
        cep VARCHAR(9),
        logradouro VARCHAR(100),
        bairro VARCHAR(100),
        cidade VARCHAR(100),
        uf VARCHAR(2)
    );

CREATE TABLE
    trem (
        id_trem INT PRIMARY KEY AUTO_INCREMENT,
        nome_trem VARCHAR(45) NOT NULL,
        modelo VARCHAR(45) NOT NULL,
        capacidade INT NOT NULL,
        status VARCHAR(45) NOT NULL,
        id_usuario INT,
        FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
    );

CREATE TABLE
    rota (
        id_rota INT PRIMARY KEY AUTO_INCREMENT,
        origem VARCHAR(45) NOT NULL,
        tempo TIME NOT NULL,
        destino VARCHAR(45) NOT NULL,
        hora DATE NOT NULL,
        id_usuario INT,
        FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
    );

CREATE TABLE
    trem_rota (
        id_trem_rota INT PRIMARY KEY AUTO_INCREMENT,
        id_trem INT,
        id_rota INT,
        FOREIGN KEY (id_trem) REFERENCES trem (id_trem),
        FOREIGN KEY (id_rota) REFERENCES rota (id_rota)
    );

CREATE TABLE
    log_acesso (
        id_log INT PRIMARY KEY AUTO_INCREMENT,
        data_hora DATETIME NOT NULL,
        acao VARCHAR(100) NOT NULL,
        id_usuario INT,
        FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
    );

CREATE TABLE
    sensor (
        id_sensor INT PRIMARY KEY AUTO_INCREMENT,
        tipo_dado VARCHAR(45) NOT NULL,
        nome VARCHAR(45) NOT NULL,
        localizacao VARCHAR(45) NOT NULL,
        id_trem INT,
        id_rota INT,
        id_usuario INT,
        FOREIGN KEY (id_trem) REFERENCES trem (id_trem),
        FOREIGN KEY (id_rota) REFERENCES rota (id_rota),
        FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
    );

CREATE TABLE
    registro_sensor (
        id_registro_sensor INT PRIMARY KEY AUTO_INCREMENT,
        id_sensor INT,
        FOREIGN KEY (id_sensor) REFERENCES sensor (id_sensor)
    );

INSERT INTO
    usuario (nome, usuario, senha, email, perfil)
VALUES
    (
        'Natan',
        'Natanzinho',
        '$2y$10$wmtRpjrvQfXSJ4y9UcyfdueWcN.92UdF2i2TmF3gOXloX/qiH0HN.',
        'natan@gmail.com',
        'admin'
    ),
    (
        'Serenna',
        'Cebola',
        '$2y$10$92Y2OpAFRMUsnXQZTcEgx.QB2uNflA7EHnpqix2Zil9yzxSr45mf.',
        'serenna@gmail.com',
        'admin'
    ),
    (
        'Henrique',
        'Batata',
        '$2y$10$kAtK23ian.cXW2Ei9ucjf.e.xj2ucxlCqc.IbTyOpLjT6.RYy9UUm',
        'henrique@gmail.com',
        'admin'
    ),
    (
        'Thais',
        'Café',
        '$2y$10$iyM.K3s6MFO/c7YES4ej.eLpVO6ebYscExVNu0K9fHvIsOMF.JHD2',
        'thais@gmail.com',
        'admin'
    ),
    (
        'Icaro',
        'Icaro Botelho',
        '$2y$10$XklNHlwJHAldi.eWQgasU.cE4t7hMIaBcs0F8h7QPLpgTM/GJ4Rj6',
        'icaro@gmail.com',
        'funcionario'
    );

INSERT INTO
    rota (origem, tempo, destino, hora, id_usuario)
VALUES
    (
        'Curitiba',
        '05:00:00',
        'Rio de Janeiro',
        '2026-10-15',
        2
    ),
    (
        'Joinville',
        '07:00:00',
        'Porto Alegre',
        '2026-10-15',
        1
    ),
    ('Torres', '10:00:00', 'Maceió', '2026-10-15', 3),
    (
        'São Paulo',
        '15:00:00',
        'Salvador',
        '2026-10-15',
        4
    ),
    (
        'Manaus',
        '20:00:00',
        'Fortaleza',
        '2026-10-15',
        1
    );

INSERT INTO
    trem (nome_trem, modelo, capacidade, status, id_usuario)
VALUES
    ('Penacony', 'AA-100', 1000, 'Ativo', 2),
    ('Amphoreus', 'AB-100', 500, 'Inativo', 3),
    ('Planarcadia', 'AC-100', 400, 'Inativo', 4),
    ('Astrópolis', 'AD-100', 900, 'Ativo', 4),
    ('Xianzou', 'AE-100', 250, 'Ativo', 4);

INSERT INTO
    trem_rota (id_trem, id_rota)
VALUES
    (1, 1),
    (2, 3),
    (3, 2),
    (4, 4),
    (5, 5);