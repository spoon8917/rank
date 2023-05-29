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
        <h1>大会結果入力</h1>
        <h2>ポイント獲得量設定を選ぶ</h2>
        <div class='member_tournament'>
            <form action="/member_tournament"  method="POST">
                @csrf
                <p><select name="tournament">
                    @foreach($tournaments as $tournament)
                        <option value="{{ $tournament->id }}">{{ $tournament->point_setting}}</option>
                    @endforeach
                    </select></p>
                <h2>一位</h2>
                <p><select name='first'>
                    @foreach($members as $member)
                        @if(Auth::user()->can('view',$member))
                            <option value="{{ $member->id }}">{{ $member->name}}</option>
                        @endif
                    @endforeach
                    </select></p>
                <h2>二位</h2>
                <p><select name='second'>
                    @foreach($members as $member)
                        @if(Auth::user()->can('view',$member))
                            <option value="{{ $member->id }}">{{ $member->name}}</option>
                        @endif
                    @endforeach
                </select></p>
                <input type="submit" value="store"/>
            </form>
        </div>
    </body>
     </x-app-layout>
    </html>
