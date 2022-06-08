<x-app.layout>
    @foreach ($tickets as $ticket)
        <x-ticket :ticket="$ticket" />
    @endforeach
</x-app.layout>
