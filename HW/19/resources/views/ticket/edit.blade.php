<x-app.layout>
    <form method="POST" action="/ticket/{{ $ticket->id }}">
        @csrf
        @method('PUT')
        <x-input name="phone" label="Phone number" type="tel" value="{{ $ticket->phone }}" disabled />
        <x-input name="ticket_number" label="Ticket number" type="text" value="{{ $ticket->ticket_number }}"
            disabled />
        <x-input name="full_name" label="Full name" type="text" value="{{ $ticket->full_name }}" />
        <x-input name="time_of_arrival" label="Time of arrival" type="datetime-local"
            value="{{ date('Y-m-d\TH:i', strtotime($ticket->time_of_arrival)) }}" />
        <x-submit>Edit my ticket</x-submit>
    </form>
</x-app.layout>
