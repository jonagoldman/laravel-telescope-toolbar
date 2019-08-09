<?php
$statusCode = $data['response_status'];
if ($statusCode > 400) {
    $statusColor = 'red';
} elseif ($statusCode > 300) {
    $statusColor = 'yellow';
} else {
    $statusColor = 'green';
}
?>

@component('telescope-toolbar::item', ['name' => 'request', 'link' => true])

    @slot('icon')
        <span class="sf-toolbar-status sf-toolbar-status-{{ $statusColor }}">{{ $statusCode }}</span>
        <span class="sf-toolbar-label"> @</span>
        <span class="sf-toolbar-value sf-toolbar-info-piece-additional">{{ $data['method'] }} {{ $data['uri'] }}</span>
    @endslot

    @slot('text')
        <div class="sf-toolbar-info-group">
            <div class="sf-toolbar-info-piece">
                <b>HTTP status</b>
                <span>{{ $statusCode }}</span>
            </div>

            @if($data['method'] !== 'GET')
            <div class="sf-toolbar-info-piece">
                <b>Method</b>
                <span>{{ $data['method'] }}</span>
            </div>
            @endif

            <div class="sf-toolbar-info-piece">
                <b>Request URI</b>
                <span title="{{ $data['uri'] }}">{{ $data['method'] }} {{ $data['uri'] }}</span>
            </div>

            <div class="sf-toolbar-info-piece">
                <b>Controller Action</b>
                <span>
                    {{ $data['controller_action'] }}
                </span>
            </div>

            @if($redirect)
            <div class="sf-toolbar-info-group">
                <div class="sf-toolbar-info-piece">
                    <b>
                        <span class="sf-toolbar-redirection-status sf-toolbar-status-yellow">{{ $redirect['response_status'] }}</span>
                        Redirect from
                    </b>
                    <span>
                        {{ $redirect['uri'] }}
                        (<a href="{{ route('telescope-toolbar.show', ['token' => $redirect['token']]) }}" target="_telescope">{{ $redirect['token'] }}</a>)
                    </span>
                </div>
            </div>
            @endif
        </div>
    @endslot

@endcomponent