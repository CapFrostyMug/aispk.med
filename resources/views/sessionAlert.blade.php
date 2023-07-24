@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-5 custom-session-alert" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" aria-label="Закрыть"></button>
    </div>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-5 custom-session-alert" role="alert">
        <span>{{ session('error') }}</span>
        <button type="button" class="btn-close" aria-label="Закрыть"></button>
    </div>
@endif
