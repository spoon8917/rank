    <!DOCTYPE html>
    <x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ranking</title>  
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>選手の総合順位</h1>
        <h1>Member Tournament Rankings</h1>
    
    <table>
        <tr>
            <th>Rank</th>
            <th>Member Name</th>
            <th>Total Points</th>
        </tr>
        
        @foreach($sortedRankings as $key => $ranking)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $ranking['member']->name }}</td>
                    <td>{{ $ranking['totalPoints'] }}</td>
                </tr>
        @endforeach
    </table>
    </body>
     </x-app-layout>
    </html>
