@if (\Session::has('success'))

    @php
        $message_data = [
            'title' => '',
            'message' => \Session::get('success'),
            'icon' => 'uil-check-circle',
            'icon_color' => 'success'
        ];
        \Session::forget('success');
    @endphp
@elseif (\Session::has('error'))
    @php
        $message_data = [
            'title' => '',
            'message' => \Session::get('success'),
            'icon' => 'uil-no-entry',
            'icon_color' => 'danger'
        ];
        \Session::forget('error');
    @endphp
@else

@endif




@isset($message_data)
<div class="modal fade" id="modal-alert-data" tabindex="-1" role="dialog" aria-labelledby="modal-alert-dataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-alert-dataLabel">{{$message_data['title']}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="{{$message_data['icon']}} text-{{$message_data['icon_color']}} display-3"></i>
                <h4 id="modal-alert-dataLabelMsg" class="text-info mt-4">{{$message_data['message']}}</h4>
                {{-- <p class="w-75 mx-auto text-muted">Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p> --}}
                <div class="mt-4">
                    <button type="button" class="btn btn-outline-primary btn-rounded width-md modal-close"  data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset

<div class="modal fade" id="modal-alert-data_ajax" tabindex="-1" role="dialog" aria-labelledby="modal-alert-dataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-alert-dataLabel_ajax"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="uil-no-entry text-warning display-3"></i>
                <h4 id="modal-alert-dataLabelMsg_ajax" class="mt-4"></h4>
                {{-- <p class="w-75 mx-auto text-muted">Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p> --}}
                <div class="mt-4">
                    <button type="button" class="btn btn-outline-primary btn-rounded width-md modal-close"  data-bs-dismiss="modal">
                        <i class="uil uil-arrow-left me-1"></i> Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>

