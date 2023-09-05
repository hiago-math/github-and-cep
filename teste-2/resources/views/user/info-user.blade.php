<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 24px;
            margin-top: 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        p {
            font-size: 16px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #dee2e6;
            font-size: 14px;
        }

        .btn-voltar {
            color: #007bff;
            font-size: 50px;
            position: absolute;
            top: 15px;
            left: 15px;
            text-decoration: none;
        }

        .btn-voltar:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<a href="{{route('form.user')}}" class="btn-voltar"><i class="fas fa-arrow-left"></i></a>
<header>
    <h1>Perfil do Usuário GITHUB</h1>
</header>
<main>
    <section>
        <h2>Informações Pessoais: </h2>
        <img src="{{ $user['avatar_url'] }}" alt="Foto de Perfil">
        <p><strong>Nome:</strong> {{ $user['name'] }}</p>
        <p><strong>Login:</strong> {{ $user['login'] }}</p>
        <p><strong>Empresa:</strong> {{ $user['company'] }}</p>
        <p><strong>Bio:</strong> {{ $user['bio'] }}</p>
    </section>

    <section>
        <h2>Estatísticas do GitHub</h2>
        <p><strong>ID do GitHub:</strong> {{ $user['github_id'] }}</p>
        <p><strong>Tipo:</strong> {{ $user['type'] }}</p>
        <p><strong>Repositórios Públicos:</strong> {{ $user['public_repos'] }}</p>
        <p><strong>Gists Públicos:</strong> {{ $user['public_gists'] }}</p>
        <p><strong>Seguidores:</strong> {{ $user['followers'] }}</p>
        <p><strong>Seguindo:</strong> {{ $user['following'] }}</p>
    </section>

    <section>
        <h2>Links</h2>
        <p><strong>Perfil no GitHub:</strong> <a href="{{ $user['html_url'] }}" target="_blank">{{ $user['login'] }}</a>
        </p>
        <p><strong>API do GitHub:</strong> <a href="{{ $user['url'] }}" target="_blank">{{ $user['url'] }}</a></p>
    </section>
</main>

<footer>
    <p>Criado em GitHub em: {{ $user['created_at_github'] }}</p>
    <p>Última atualização em GitHub em: {{ $user['updated_at_github'] }}</p>
    <p>Criado em: {{ $user['created_at'] }}</p>
    <p>Última atualização em: {{ $user['updated_at'] }}</p>

</footer>
</body>
</html>
