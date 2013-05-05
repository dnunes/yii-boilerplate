yii-boilerplate
===============
Essa é uma estrutura base para o framework Yii em PHP, com layout em HTML5.

### Por quê?

Esse repositório contém, além de uma versão "light" do framework em si (que pode ser facilmente atualizado), todos os arquivos de configuração já funcionais para os paths *melhorados*, além de exemplos de model, controller, layout, view, partial...

### Estrutura Básica
A base da estrutura atual é a seguinte:

  /
  README.md

  _protected/
    ...

    config/
      main.php

    controllers/
    models/
    views/
      ...

      layouts/
        index.php

        _parts/
          ...

  _runtime/
  _yiif/
  webroot/
    .htaccess.model
    index.php

    _assets/
    css/
    img/
    js/

Os arquivos de configuração relevantes são:
 * /webroot/***.htaccess.model*** - Configuração de rewrite da aplicação no caso de uso do Apache. Copie o arquivo para *.htaccess*.
 * /webroot/***index.php*** - Configure os ambientes da aplicação (banco de dados, debug)
 * /_protected/config/***routes.php*** - Rotas da aplicação. Formato padrão do Yii
 * /_protected/config/***main.php*** - Configuração interna do Yii
