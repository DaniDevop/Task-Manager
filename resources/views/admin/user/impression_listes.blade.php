<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table des Membres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

    <h2>LISTES DES MEMBRES</h2>
    <div>
        Date : {{$date}}
    </div>
    <table>
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Compte</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $users)
            <tr>
                <td>{{$users->id}}</td>
                <td>{{$users->nom}}</td>
                <td>{{$users->prenom}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->activation}}</td>
                @if($users->role==0)
                <td>USER</td>
                @else
                <td>ADMIN</td>
                @endif
            </tr>
            @endforeach
            
        
        </tbody>
    </table>

</body>
</html>
