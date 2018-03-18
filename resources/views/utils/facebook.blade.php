{{-- Facebook callback appends #_=_ hash underscore to the Return URL. This gets rid of it --}}
<script type="text/javascript">
    if (window.location.hash == '#_=_') {
        history.replaceState
            ? history.replaceState(null, null, window.location.href.split('#')[0])
            : window.location.hash = '';
    }
</script>
