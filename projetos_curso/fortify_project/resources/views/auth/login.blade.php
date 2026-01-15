<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action=" {{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>
        <div>
            <label for="">Senha</label>
            <input type="password" name="password" id="">
        </div>
        <div>
            <input type="submit" value="Salvar">
        </div>
    </form>
</body>
</html>