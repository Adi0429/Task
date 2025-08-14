<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: {{ $fontSize }}pt;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
        }
        th {
            text-align: center;
            font-weight: bold;
        }
        .right { text-align: right; }
        .left { text-align: left; }
    </style>
</head>
<body>
    <table>
        <tr>
            @foreach($headings as $heading)
                <th>{{ $heading }}</th>
            @endforeach
        </tr>
        @foreach($rows as $row)
            <tr>
                @foreach($row as $cell)
                    @if(is_numeric($cell))
                        <td class="right">{{ $cell }}</td>
                    @else
                        <td class="left">{{ $cell }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
