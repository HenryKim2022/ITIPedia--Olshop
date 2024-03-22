<div>
    <textarea class="editor" name="description"> </textarea>
</div>

@if ($errors->has('description'))
<span class="text-danger">{{ $errors->first('description') }}</span>
@endif