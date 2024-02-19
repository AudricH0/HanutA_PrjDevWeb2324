<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    @if($type === 'success')
        <i class="bi bi-shield-check"></i>
    @else
        <i class="bi bi-shield-exclamation"></i>
    @endif
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
