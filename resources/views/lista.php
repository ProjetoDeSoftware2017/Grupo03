<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabalho Dani</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="content">
        <h2>Buscar em:</h2>
        <form action="/mostra_regioes" method="get">
        <select name="id" >
        <option name="id" value="0">Selecione uma região Brasileira</option>
        <?php
        foreach ($cid as $p):
        ?> 
        <option value="<?=$p->id_Regiao?>"> <?=$p->Nome?> <?=$p->Estado?></option>
        <?php endforeach ?>
        </select>   <button type="submit">Buscar</button> </form>
    </div>
</body>
</html>
