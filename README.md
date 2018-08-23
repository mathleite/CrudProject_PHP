# Projeto-SistemaCadastro (Docker-PHP7-Composer-mySQL)
- O sistema funciona no Web Server local, portando para subir o projeto é necessário usar o comando **`docker-compose up`** na pasta 'docker', onde está o **`docker-compose.yml`**.
- Conecte o sistema com o mySQL/Postgres. As informações necessárias estão em `/src/ConexaoBanco.php` (Se for Postgres é necessário mudar o dsn `"mysql"` para `"pgsql"`), após isso, utilize a estrutura disponibilizada em `/estrutura_banco` para o mySQL.
- **A estrutura para Postgres está em desenvolvimento.**
