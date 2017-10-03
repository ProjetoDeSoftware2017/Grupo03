<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página de exemplo</title>
    <style type="text/css">
            *{ /*Formata todos os elementos da página*/
                padding:0px; /*espaço entre a borda e o conteúdo do elemento*/
                margin:0px; /*espaço entre a borda e os elementos externos*/
            }
            #topo{
                width: 100%; /*largura*/
                height: 120px; /*altura*/
                text-align: center; /*alinhamento do texto*/
                clear: both; /*não permite elementos flutuantes ao lado*/
                background-color: #FFFFFF; /*cor de fundo*/
            }
            #menu{
                height: 50px; /*altura*/
                text-align: center; /*alinhamento do texto*/
                padding: 10px; /*espaço entre a borda e o conteúdo do elemento*/
                background-color: #ffcc00; /*cor de fundo*/
            }
            #meio{
                width: 100%; /*largura*/
                background-color: #f90; /*cor de fundo*/
                height: 80%;; /*altura*/
            }
            #lateral{
                float:right; /*define que o elemento deve flutuar à direita*/
                background-color: #ff6600; /*cor de fundo*/
                padding: 10px; /*espaço entre a borda e o conteúdo do elemento*/
                width: 15% /*largura*/
            }
            #conteudo{
                padding: 10px; /*espaço entre a borda e o conteúdo do elemento*/
                width: 80%; /*largura*/
                float:left; /*define que o elemento deve flutuar à esquerda*/
                background-color: #999999; /*cor de fundo*/
            }
            #rodape{
                clear: both; /*não permite elementos flutuantes ao lado*/
                text-align: center; /*alinhamento do texto*/
                padding: 10px; /*espaço entre a borda e o conteúdo do elemento*/
                background-color: #cccccc; /*cor de fundo*/
            }
        </style>
  </head>
  <body> <img style="width: 1311px; height: 100px;" alt="" src="arco2.png"><br>
    <nav id="menu"> <a href="#">Menu 1</a> <a href="#">Menu 2</a> <a href="#">Menu
        3</a> <a href="#">Menu 4</a> <a href="#">Menu 5</a> </nav>
    <section id="meio">
      <article id="conteudo"> Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
        Aqui vai o conteúdo <br>
      </article>
      <aside id="lateral">
        <p>Barra lateral</p>
      </aside>
    </section>
    <footer id="rodape">
      <h2>Rodapé da página</h2>
    </footer>
  </body>
</html>
