<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTE - 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 450px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .custom-toast {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #ff4d4d; /* Cor de fundo vermelha */
            color: #fff; /* Cor do texto branco */
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999; /* Z-index para manter no topo da página */
            animation: slide-up 0.5s ease-in-out; /* Animação de entrada */
        }

        .custom-toast ul {
            list-style-type: none; /* Remove o marcador da lista */
            padding-left: 0; /* Remove o recuo à esquerda */
        }

        @keyframes slide-up {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<h1>Buscar usuário GITHUB</h1>

<form action="{{ route('info.user') }}" method="GET">
    @if ($errors->any())
        <div class="custom-toast">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <input type="text" id="login" name="login" placeholder="Digite o Username/Login aqui..." required>

    <button type="submit">Enviar</button>
</form>
</body>
</html>
