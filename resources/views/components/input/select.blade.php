<div class="form-group">
    <select name="{{ $name ?? '' }}" class="form-control @error($name ?? '') is-invalid  @enderror">
        <option value="">--- Pilih ---</option>
        {{ $slot ?? '' }}
    </select>
    <label for="{{ $name ?? '' }}" class="form-label">{{ $label ?? '' }}</label>
    @error($name ?? '')
        <span class="invalid-message">{{ $message }}</span>
    @enderror
</div>
