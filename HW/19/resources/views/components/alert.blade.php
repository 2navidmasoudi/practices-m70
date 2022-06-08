<div>
    @if ($type == 'error')
        <p class="error bg-red-300">
            @if ($error == '404')
                <span class="text-red-800">
                    Not Found.
                </span>
            @else
                {{ $error }}
            @endif
        </p>
    @endif
</div>
