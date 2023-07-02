@foreach (['success', 'warning', 'danger', 'primary'] as $status)
    @if (session($status))
        <div class="alert alert-{{ $status }} alert-dismissible fade show " style="margin-top: -3%" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ session($status) }}</strong>
        </div>
    @endif
@endforeach

<script>
    setTimeout(() => {
        $('.alert').hide('slow')
    }, 2000);
</script>
