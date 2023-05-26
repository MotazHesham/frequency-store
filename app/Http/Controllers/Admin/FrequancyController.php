<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFrequancyRequest;
use App\Http\Requests\StoreFrequancyRequest;
use App\Http\Requests\UpdateFrequancyRequest;
use App\Models\Frequancy;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FrequancyController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('frequancy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Frequancy::query()->select(sprintf('%s.*', (new Frequancy)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'frequancy_show';
                $editGate      = 'frequancy_edit';
                $deleteGate    = 'frequancy_delete';
                $crudRoutePart = 'frequancies';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('frequency', function ($row) {
                return $row->frequency ? $row->frequency : '';
            });
            $table->editColumn('frequency_type', function ($row) {
                return $row->frequency_type ? Frequancy::FREQUENCY_TYPE_SELECT[$row->frequency_type] : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('tag_1', function ($row) {
                return $row->tag_1 ? $row->tag_1 : '';
            });
            $table->editColumn('tag_2', function ($row) {
                return $row->tag_2 ? $row->tag_2 : '';
            });
            $table->editColumn('tag_3', function ($row) {
                return $row->tag_3 ? $row->tag_3 : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.frequancies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('frequancy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frequancies.create');
    }

    public function store(StoreFrequancyRequest $request)
    {
        $frequancy = Frequancy::create($request->all());

        return redirect()->route('admin.frequancies.index');
    }

    public function edit(Frequancy $frequancy)
    {
        abort_if(Gate::denies('frequancy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frequancies.edit', compact('frequancy'));
    }

    public function update(UpdateFrequancyRequest $request, Frequancy $frequancy)
    {
        $frequancy->update($request->all());

        return redirect()->route('admin.frequancies.index');
    }

    public function show(Frequancy $frequancy)
    {
        abort_if(Gate::denies('frequancy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.frequancies.show', compact('frequancy'));
    }

    public function destroy(Frequancy $frequancy)
    {
        abort_if(Gate::denies('frequancy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frequancy->delete();

        return back();
    }

    public function massDestroy(MassDestroyFrequancyRequest $request)
    {
        $frequancies = Frequancy::find(request('ids'));

        foreach ($frequancies as $frequancy) {
            $frequancy->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
