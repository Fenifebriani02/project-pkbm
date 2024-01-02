<div class="form-group" @isset($inputdropdown)x-on:click="open = !open" @endisset>
    <input type="{{ $type ?? '' }}" name="{{ $name ?? '' }}"
        class="form-control @error($name ?? '') is-invalid  @enderror"
        value="@isset($value){{ $value }}@else{{ old($name ?? '') }}@endisset"
        placeholder="{{ $placeholder ?? '' }}" id="{{ $id ?? '' }}"
        @isset($disabled)readonly @endisset>
    <label for="{{ $name ?? '' }}" class="form-label">{{ $label ?? '' }}</label>
    @error($name ?? '')
        <span class="invalid-message">{{ $message }}</span>
    @enderror
</div>
