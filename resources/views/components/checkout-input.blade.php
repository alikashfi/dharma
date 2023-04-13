<div class="form-group">
    <label for="{{ $name }}">{{ $label }} <abbr class="required" title="required">*</abbr></label>
    <input name="{{ $name }}" id="{{ $name }}" type="text" class="form-control" value="{{ old($name, auth()->user()->$name) }}" {{ ! auth()->user()->$name ?: 'readonly' }}>
</div>