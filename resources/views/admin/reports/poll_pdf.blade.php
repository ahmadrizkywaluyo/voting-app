<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Polling</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        .meta {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background: #f3f3f3;
        }
    </style>
</head>
<body>

    <h1>LAPORAN HASIL VOTING</h1>

    <div class="meta">
        <strong>Judul Polling:</strong> {{ $poll->title }} <br>
        <strong>Total Suara:</strong> {{ $totalVotes }} <br>
        <strong>Tanggal Cetak:</strong> {{ now()->format('d M Y') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Opsi</th>
                <th>Jumlah Suara</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $option)
                <tr>
                    <td>{{ $option->option_text }}</td>
                    <td>{{ $option->votes_count }}</td>
                    <td>
                        {{ $totalVotes > 0 
                            ? round(($option->votes_count / $totalVotes) * 100, 2) 
                            : 0 }}%
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
