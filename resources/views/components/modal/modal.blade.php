<div class="modal fade" id="{{ $id ?? '' }}" tabindex="-1" aria-labelledby="{{ $id ?? '' }}" aria-hidden="true">
    <div class="modal-dialog {{ $modalDialog ?? '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $id ?? '' }}">{{ $title ?? '' }}</h1>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $action ?? '' }}" enctype="multipart/form-data">
                    @csrf
                    {{ $slot ?? '' }}
                </form>
            </div>

        </div>
    </div>
</div>
