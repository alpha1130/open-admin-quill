<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} form-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div id="{{$id}}" class="quill-editor-{{$id}}" style="height: 400px;" data-initialed="false">
            <p>{!! old($column, $value) !!}</p>
        </div>

        <input class="quill-input-{{$id}}" type="hidden" name="{{$name}}" value="{{ old($column, $value) }}" />

        @include('admin::form.help-block')

    </div>
</div>