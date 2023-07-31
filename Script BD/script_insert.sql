-- COMANDO PARA INSERIR
-- insert into da_tabela (colunas) values (valores)

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Ana Maria','ana@gmail.com', 'senha123','2023-01-31');

insert into tb_categoria
(nome_categoria,id_usuario)
values
('Pedágio',1);

insert into tb_conta
(banco_conta,agencia_conta,numero_conta,saldo_conta,id_usuario)
values
('Itaú', '08', '123456789', '2', '2');














































































