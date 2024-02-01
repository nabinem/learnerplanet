@foreach (['warning', 'success', 'error', 'info', 'status', 'message'] as $flashMsgKey)
    @if ($flashMsg = session($flashMsgKey))
        <x-alert :type="$flashMsgKey" :message="$flashMsg"/>
    @endif
@endforeach