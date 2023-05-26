@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.frequancy.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.frequancies.update", [$frequancy->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="frequency">{{ trans('cruds.frequancy.fields.frequency') }}</label>
                <input class="form-control {{ $errors->has('frequency') ? 'is-invalid' : '' }}" type="number" name="frequency" id="frequency" value="{{ old('frequency', $frequancy->frequency) }}" step="0.001" required>
                @if($errors->has('frequency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frequency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frequancy.fields.frequency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.frequancy.fields.frequency_type') }}</label>
                <select class="form-control {{ $errors->has('frequency_type') ? 'is-invalid' : '' }}" name="frequency_type" id="frequency_type" required>
                    <option value disabled {{ old('frequency_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Frequancy::FREQUENCY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('frequency_type', $frequancy->frequency_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('frequency_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frequency_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frequancy.fields.frequency_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.frequancy.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $frequancy->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frequancy.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tag_1">{{ trans('cruds.frequancy.fields.tag_1') }}</label>
                <input class="form-control {{ $errors->has('tag_1') ? 'is-invalid' : '' }}" type="text" name="tag_1" id="tag_1" value="{{ old('tag_1', $frequancy->tag_1) }}" required>
                @if($errors->has('tag_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frequancy.fields.tag_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tag_2">{{ trans('cruds.frequancy.fields.tag_2') }}</label>
                <input class="form-control {{ $errors->has('tag_2') ? 'is-invalid' : '' }}" type="text" name="tag_2" id="tag_2" value="{{ old('tag_2', $frequancy->tag_2) }}">
                @if($errors->has('tag_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frequancy.fields.tag_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tag_3">{{ trans('cruds.frequancy.fields.tag_3') }}</label>
                <input class="form-control {{ $errors->has('tag_3') ? 'is-invalid' : '' }}" type="text" name="tag_3" id="tag_3" value="{{ old('tag_3', $frequancy->tag_3) }}">
                @if($errors->has('tag_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.frequancy.fields.tag_3_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
