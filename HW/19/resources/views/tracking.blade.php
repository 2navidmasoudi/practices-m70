<x-app.layout>
    <form method="POST">
        @csrf
        <x-input name="phone" label="Phone number" type="tel" value="{{ $phone ?? '' }}" />
        <x-input name="ticket_number" label="Ticket number" type="text" value="{{ $ticket_number ?? '' }}" />
        <x-submit>Find my ticket</x-submit>
    </form>
</x-app.layout>
