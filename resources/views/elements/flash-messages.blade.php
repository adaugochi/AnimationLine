<script>
    @if (session()->has('status'))
    toastr.success("{{ session()->get('status')  }}");

    @elseif (session()->has('info'))
    toastr.info("{{ session()->get('info') }}");

    @elseif (session()->has('error'))
    toastr.error("{{ session()->get('error') }}");

    @endif
</script>