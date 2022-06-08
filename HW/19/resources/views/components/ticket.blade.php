<div>
    <p class="text-bold text-blue-700 border p-2 m-3 rounded border-purple-400 inline-block">Ticket
        #{{ $ticket->ticket_number }}
    </p>
    <p class="text-gray-800 mx-3">Phone Number: {{ $ticket->phone }}</p>
    <p class="text-gray-800 mx-3">Full Name: {{ $ticket->full_name }}</p>
    <p class="text-gray-800 mx-3">Time of arrival: {{ $ticket->time_of_arrival }}</p>

    <p class="text-gray-600 mx-3 border inline-block">Note: please save your ticket number for edit and cancle</p>
    {{ $slot }}

    <div class="m-3">
        <x-link href="/ticket/{{ $ticket->id }}/edit"
            class="border border-blue-700 bg-blue-900 text-white rounded-lg px-3">
            Edit
        </x-link>
        <form action="/ticket/{{ $ticket->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <x-submit class="mx-2 bg-red-900 text-white rounded-lg px-3">
                Delete
            </x-submit>
        </form>
    </div>
</div>
