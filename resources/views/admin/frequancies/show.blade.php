@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.frequancy.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.frequancies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.id') }}
                        </th>
                        <td>
                            {{ $frequancy->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.frequency') }}
                        </th>
                        <td>
                            {{ $frequancy->frequency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.frequency_type') }}
                        </th>
                        <td>
                            {{ App\Models\Frequancy::FREQUENCY_TYPE_SELECT[$frequancy->frequency_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.description') }}
                        </th>
                        <td>
                            {{ $frequancy->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.tag_1') }}
                        </th>
                        <td>
                            {{ $frequancy->tag_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.tag_2') }}
                        </th>
                        <td>
                            {{ $frequancy->tag_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frequancy.fields.tag_3') }}
                        </th>
                        <td>
                            {{ $frequancy->tag_3 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.frequancies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
