<x-app.layout title="Create a ticket">
    <form action="/ticket" method="POST">
        @csrf
        <x-input name="phone" label="Phone number" type="tel" />
        <x-input name="full_name" label="Full name" type="text" />
        <x-input name="time_of_arrival" label="Time of arrival" type="datetime-local" />
        <x-submit>Wash my car</x-submit>
    </form>
</x-app.layout>
