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
                <th>Taches</th>
                <th>Catégorie</th>
                <th>Date-écheances</th>
                <th>Créer-Par</th>
                <th>Attribué-à</th>
            </tr>
        </thead>
        <tbody>
            @foreach($taches as $tachess)
            <tr>
                <td>{{$tachess->id}}</td>
                <td>{{$tachess->taches_name}}</td>
                <td>{{$tachess->categorie->name}}</td>
                <td>{{$tachess->date_echeances}}</td>
                <td>{{$tachess->user_action}}</td>
                <td>{{$tachess->User->name}}</td>

            </tr>
            @endforeach
            
        
        </tbody>
    </table>

</body>
</html>
