select nome_usuario, email_usuario
	from tb_usuario;
    
	select nome_categoria, nome_usuario
		from tb_categoria
inner join tb_usuario
			on tb_categoria.id_usuario = tb_usuario.id_usuario;
            
            	select *
		from tb_categoria
inner join tb_usuario
			on tb_categoria.id_usuario = tb_usuario.id_usuario;
            
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
                    
    
