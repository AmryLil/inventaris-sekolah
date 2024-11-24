<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h1>Daftar Guru</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Location</th>
                <th>About Me</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name_222291 }}</td>
                    <td>{{ $user->email_222291 }}</td>
                    <td>{{ ucfirst($user->role_222291) }}</td>
                    <td>{{ $user->phone_222291 }}</td>
                    <td>{{ $user->location_222291 }}</td>
                    <td>{{ $user->about_me_222291 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Generated on: {{ now()->format('d-m-Y H:i:s') }}</p>
</body>

</html>
