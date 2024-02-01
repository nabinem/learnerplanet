@php
    $icons = [
        'success' => 'bi-check-circle-fill', 
        'danger' => 'bi-exclamation-octagon-fill',
        'warning' => 'bi-exclamation-triangle-fill',
        'info' => 'bi-info-circle-fill'
    ];
    $alertClass = 'secondary';
    if (in_array($type, ['success', 'info', 'danger', 'warning'])){
        $alertClass = $type;
    } else if (in_array($type, ['error'])){
        $alertClass = 'danger';
    }
@endphp

<div 
    class="alert alert-{{ $alertClass }} alert-dismissible fade show flash-alert mx-2 mt-2" 
    role="alert"
>
    <div class="d-flex align-items-center">
        <strong class="me-2">
            <i class="bi {{ $icons[$alertClass] ?? $icons['info'] }}"></i>
        </strong>
        <span class="">
            {!! 
                is_array($message) 
                    ? ('<ul><li>'.implode('</li><li>', $message).'</li></ul>') 
                    : $message 
            !!}
        </span>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>