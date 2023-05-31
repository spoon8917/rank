<x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Ranking</title>
    </head>
    
    <body class="antialiased">
        <h1>大会結果入力</h1>
        <h2>ポイント獲得量設定を選ぶ</h2>
        <div class='member_tournament'>
            <form action="/member_tournament"  method="POST">
                @csrf
                <p><select name="tournament">
                    @foreach($tournaments as $tournament)
                        <option value="{{ $tournament->id }}">{{ $tournament->name}}</option>
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
                <h2>三位</h2>
                <p><select name='third'>
                    @foreach($members as $member)
                        @if(Auth::user()->can('view',$member))
                            <option value="{{ $member->id }}">{{ $member->name}}</option>
                        @endif
                    @endforeach
                </select></p>
                <h2>ベスト8</h2>
                <p>
                    @foreach($members as $member)
                        @if(Auth::user()->can('view',$member))
                            <label>
                                <input type="checkbox" value="{{ $member->id }}" name="best8[]">
                                    {{$member->name}}
                                </input>
                            </label>
                        @endif
                    @endforeach
                </p>
                <h2>ベスト16</h2>
                <p>
                    @foreach($members as $member)
                        @if(Auth::user()->can('view',$member))
                            <label>
                                <input type="checkbox" value="{{ $member->id }}" name="best16[]">
                                    {{$member->name}}
                                </input>
                            </label>
                        @endif
                    @endforeach
                </p>
                <h2>ベスト32</h2>
                <p>
                    @foreach($members as $member)
                        @if(Auth::user()->can('view',$member))
                            <label>
                                <input type="checkbox" value="{{ $member->id }}" name="best32[]">
                                    {{$member->name}}
                                </input>
                            </label>
                        @endif
                    @endforeach
                </p>
                <input type="submit" value="store"/>
            </form>
        </div>
    </body>
</x-app-layout>
    
