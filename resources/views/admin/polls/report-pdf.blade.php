<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Polling</title>
    <style>
        body { font-family: sans-serif; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #ccc; padding:8px; }
        th { background:#f3f3f3; }
    </style>
</head>
<body>

<h2>Laporan Hasil Voting</h2>
<p><strong>Judul:</strong> {{ $poll->title }}</p>
<p><strong>Total Suara:</strong> {{ $totalVotes }}</p>

<table>
    <thead>
        <tr>
            <th>Opsi</th>
            <th>Jumlah Suara</th>
            <th>Persentase</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($poll->options as $option)
            @php
                $count = $option->votes->count();
                $percent = $totalVotes > 0
                    ? round(($count / $totalVotes) * 100, 2)
                    : 0;
            @endphp
            <tr>
                <td>{{ $option->option_text }}</td>
                <td>{{ $count }}</td>
                <td>{{ $percent }}%</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>