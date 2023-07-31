select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like '%u%';


-- Buscar pelas iniciais
select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like 'C%';

-- Buscar pela letra final
select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like '%R';

-- Busca por periodo
select nome_usuario, data_cadastro
from tb_usuario
where data_cadastro between '2021-01-15' and '2023-01-15';


select banco_conta, agencia_conta, saldo_conta
from tb_conta
where id_usuario = 2;

select  tipo_movimento,
		data_movimento,
        valor_movimento,
        nome_categoria,
        nome_empresa,
        nome_usuario,
        banco_conta
	from tb_movimento
inner join tb_categoria
	  on tb_categoria.id_categoria = tb_movimento.id_categoria
inner join tb_empresa
	  on tb_empresa.id_empresas = tb_movimento.id_empresas
inner join tb_usuario
	  on tb_usuario.id_usuario = tb_movimento.id_usuario
inner join tb_conta
      on tb_conta.id_conta = tb_movimento.id_conta
      where tb_movimento.tipo_movimento = 1
        and tb_movimento.valor_movimento < 50;
        
select sum(valor_movimento) as total
from tb_movimento
where tipo_movimento = 1
and id_usuario = 1;