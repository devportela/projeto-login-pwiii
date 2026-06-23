<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro De Usuários</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background: #eaf3ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container{
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 380px;
        }

        h2{
            text-align: center;
            color: #0066cc;
            margin-bottom: 25px;
        }

        form{
            display: flex;
            flex-direction: column;
        }

        input{
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="submit"]{
            background: #0066cc;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        input[type="submit"]:hover{
            background: #004999;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Cadastro de Usuario</h2>

    <form method="POST" action="login.php">

        <input 
            type="text"
            placeholder="Digite um nome"
            name="nome"
        >

        <input 
            type="text"
            placeholder="Digite um email"
            name="email"
        >

        <input 
            type="password"
            placeholder="Digite uma senha"
            name="senha"
        >

        <input 
            type="submit"
            value="Cadastrar"
        >

    </form>

</div>

</body>

</html>