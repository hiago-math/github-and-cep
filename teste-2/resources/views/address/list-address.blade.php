<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTE - 3</title>
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


        button[class="limpar"] {
            background-color: orangered;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[class="limpar"]:hover {
            background-color: red;
        }

        button[class="importar"] {
            background-color: green;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[class="importar"]:hover {
            background-color: darkgreen;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilos para realçar a primeira linha da tabela (cabeçalho) */
        thead tr {
            background-color: #007bff;
            color: white;
        }

        /* Estilos para realçar a primeira coluna da tabela (CEP) */
        tbody td:first-child {
            font-weight: bold;
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
<h1>Buscar CEP</h1>

<form action="{{ route('search.address') }}" method="GET">
    @if ($errors->any())
        <div class="custom-toast">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <input type="text" id="zip_code" name="zip_code" placeholder="Digite o CEP aqui..." required>

    <button type="submit">Buscar</button>
</form>
<form>
    <form action="{{ route('clean.address') }}" method="POST">
        @csrf
        @method('PATCH')

        <h1>Ultimos buscados</h1>
        <button class="limpar" type="submit">Limpar</button>

        <table>
            <thead>
            <tr>
                <th>Cep</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dados as $dado)
                <tr>
                    <td>{{ $dado['zip_code'] }}</td>
                    <td>{{ $dado['public_place'] }}</td>
                    <td>{{ $dado['district'] }}</td>
                    <td>{{ $dado['city'] }}</td>
                    <td>{{ $dado['uf'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    <form action="{{ route('download.list.address') }}" method="GET">
        <button class="importar" type="submit">Exportar</button>
    </form>
</form>
</body>
</html>
