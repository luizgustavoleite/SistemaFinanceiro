-- COMANDO PARA ATUALIZAR (UPDATE)

update tb_usuario
	set email_usuario = 'ana@email.com',
		senha_usuario = 'senha321'
where id_usuario = '1';

update tb_usuario
                            set nome_usuario = '?',
                                email_usario = '?'
                         where id_usuario = '?';
                         
						update tb_empresa 
                        set nome_empresa = 'oi', telefone_empresa = '9', endereco_empresa = 'a'
                        where id_empresas = '1' and id_usuario = '1';
                         
                         
	