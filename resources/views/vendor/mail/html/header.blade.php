<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Controle de Tarefas')
<img src="{{ asset('/img/logo.png') }}" class="logo" alt="App Controle Tarefas Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
