Aplicação simples de banco.

Elabore uma aplicação de home banking utilizando o modelo MVC com as seguintes operações

    •Criação de contas com saldo inicial
    •Saques
    •Depósitos
    •Transferências
    •Saldo

        As informações dos clientes devem ser mantidas em um HashMap no servidor
        •Campos
        ▫NroConta
        ▫Nome
        ▫Saldo

A página inicial (index.jsp) deve conter um conjunto de radio buttons para permitir que 
o usuário escolha qual operação deseja executar
    
    •A escolha deve ativar um servlet (operationServlet) que faz o “dispatch” para a página JSP 
    que colherá os dados para realizar a operação desejada

        ▫5 páginas JSP são necessárias
        ▫Para cada página JSP deve haver um servlet que recebe os dados, 
         executa a lógica de negócio e faz o dispatch para outras páginas 
         JSP com a resposta da transação solicitada
        ▫As páginas de resposta devem conter um link para a página inicial

    Bean Cliente
        ▫Deverá conter o modelo de dados da aplicação (model)

    •Classes de lógica de negócio
        ▫Criar classes que executem a lógica de negócio necessária à aplicação (control)

    •Importante
        ▫Toda a parte de visão deve utilizar páginas JSP