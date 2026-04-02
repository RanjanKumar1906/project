<h1>odd/even</h1>

@for ($i = 0; $i < 10; $i++)
    @if($i % 2 == 0)
        <h1>{{ $i }} is even</h1>
    @else
        <h1>{{ $i }} is odd</h1>
    @endif
@endfor

{!! " <h1> Hi</h1>" !!}
{!! " <script> alert('int221 ETP will be held in june 2026') </script>" !!}
{!! " <script> alert('Time table updated')</script>" !!}

@php
$cars=["benz","alto","swift","audi"];
@endphp
<ul>
    @foreach($cars as $car)
    @if($loop->first)
    <li style="color: red"> {{$loop->count}}-{{$car}}</li>
    @endif
<li>{{$loop->count}}-{{$car}}</li>
@endforeach
</ul>