Projeto Prático Final – PHP (Valor: 2,5 pontos)

DUPLA:
Saulo Jorrã de Lima RGM: 32567103
Matheus Eduardo Mafioletti RGM: 8834681418

Tema: Sistema Carros
Tema livre: O aluno (ou dupla) pode escolher o contexto (ex: cadastro de livros, produtos, receitas, filmes, tarefas, etc.), desde que todos os requisitos funcionais sejam contemplados.

Requisitos Funcionais
1. Cadastro de Novo Usuário
O sistema deve permitir o cadastro de novos usuários, armazenando pelo menos:
Nome de usuário (login)
Senha
E-mail ou outro campo de identificação
2. Validação de Login e Senha
O usuário deve conseguir acessar o sistema apenas se informar corretamente login e senha cadastrados.
Dados de acesso inválidos devem ser tratados com mensagem clara.
3. Cadastro de Itens (Apenas após Login)
Após autenticação, o usuário poderá cadastrar itens relacionados ao tema escolhido (ex: livros, filmes, tarefas).
Cada item deve ter, pelo menos, um título/nome e uma descrição.
Os itens cadastrados devem ser associados ao usuário logado.
4. Exibição dos Itens Cadastrados
O sistema deve listar, em uma página, todos os itens cadastrados pelo usuário autenticado.
A listagem deve exibir as principais informações do item.
5. Exclusão dos Itens Cadastrados
O usuário poderá excluir qualquer item que ele mesmo cadastrou.
6. Validação de Dados
Não deve ser possível cadastrar usuários ou itens com campos obrigatórios em branco.
Deve haver mensagens de validação para campos faltantes ou inválidos.
7. Logout
O sistema deve permitir que o usuário encerre sua sessão (logout) e, ao fazer isso, bloqueie o acesso às páginas restritas.
8. Estética e Apresentação Visual
O sistema deve utilizar CSS ou um framework como Bootstrap para melhorar a apresentação visual e a usabilidade das telas.
Observações Gerais
O sistema deve utilizar PHP com conexão a banco de dados MySQL, preferencialmente com prepared statements (mysqli).
É obrigatório o uso de sessões para controle de autenticação.
O projeto deve ser entregue com instruções claras para instalação e execução (incluindo script SQL para criação das tabelas).
O código deve ser organizado, comentado e dividido em arquivos conforme boas práticas vistas em aula.
O tema deve ser original, e não refletir nenhuma atividade ou exemplo passados em sala.
Cópia integral do código do professor será considerado plágio. O aluno ou dupla que tiver copiado códigos de aula de forma idêntica terão seu trabalho prático anulado.
Entrega
Subir projeto em repositório público GIT e publicar o link na entrega do trabalho.
Incluir um arquivo README.txt ou similar com:
Tema escolhido
Resumo do funcionamento
Usuário/senha de teste
Passos para instalação do banco
APENAS UM MEMBRO DA DUPLA PRECISA ENTREGAR O TRABALHO. LEMBREM-SE DE IDENTIFICAR QUEM SÃO OS ALUNOS QUE FIZERAM O TRABALHO NO ARQUIVO README E NA HORA DA ENTREGA NO BLACKBOARD.
