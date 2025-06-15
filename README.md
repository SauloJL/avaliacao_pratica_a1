DUPLA:
Saulo Jorrã de Lima RGM: 32567103
Matheus Eduardo Mafioletti RGM: 8834681418

Tema escolhido:
Sistema de Cadastro de Carros

Resumo do funcionamento:
Este sistema permite que usuários se cadastrem, façam login e gerenciem uma lista de carros cadastrados. Após o login, o usuário pode adicionar, visualizar e excluir seus próprios carros, cada um com título (modelo) e descrição. O sistema protege páginas restritas, valida os dados inseridos e utiliza sessões para controle de acesso.

Usuário/senha de teste:
Usuário: teste
Senha: 123
(Cadastre este usuário manualmente ou via tela de cadastro.)

Passos para instalação do banco:

Abra o phpMyAdmin ou outro gerenciador de banco de dados MySQL.

Crie um banco com o nome: bd_carros.

Importe o script criar_banco.sql disponível na pasta /sql/.

Configure corretamente os dados de conexão em conexao.php, se necessário (usuário, senha e host).

Execute o sistema em um servidor local como XAMPP, WAMP ou outro compatível com PHP e MySQL.

Acesse o sistema via index.php.
