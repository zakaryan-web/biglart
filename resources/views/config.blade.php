<script>
    window.echoData = {
        key: '{{ config('app.echo.key') }}',
        wsHost: '{{ config('app.echo.wsHost') }}',
        wsPort: '{{ config('app.echo.wsPort') }}',
        wssPort: '{{ config('app.echo.wssPort') }}',
        forceTLS: '{{ config('app.echo.forceTLS') }}',
    }
</script>
