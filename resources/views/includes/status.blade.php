@if (session('status'))
    <div class="text-success">
        <p>{{ session('status') }}</p>
    </div>
@endif
