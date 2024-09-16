-- Criação do banco de dados e sua seleção
CREATE DATABASE IF NOT EXISTS checkout;
USE checkout;

-- Criação da tabela usada na aplicação
CREATE TABLE IF NOT EXISTS cartao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeCartao VARCHAR(50) NOT NULL,
    numeroCartao VARCHAR(19) NOT NULL,
    validadeCartao CHAR(5) NOT NULL,
    cvcCartao CHAR(3) NOT NULL
);

-- Adição de dados de exemplo (opcional)
INSERT INTO cartao (nomeCartao, numeroCartao, validadeCartao, cvcCartao)
VALUES
('João da Silva', '1111 2222 3333 4444', '12/25', '123'),
('Maria Oliveira', '5555 6666 7777 8888', '11/24', '456');
