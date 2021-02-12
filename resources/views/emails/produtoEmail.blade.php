<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail produto</title>
</head>
<body>
<h1>Teste de E-mail</h1>
<h1> {{ $title }}</h1>
<p> Olá, {{ $name }}, segue sua lista de produtos favoritos</p>
<ul>
    @foreach($produtos as $produto)
        <li>{{ $produto->produto_id }}</li>
    @endforeach
</ul>
</body>
</html>
