<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FinancialReports;
use App\Http\Resources\FinancialReport as FinancialReportResources;

class ApiFinancialReports extends Controller
{
    //

    public function show()
    {
        $reports = FinancialReportResources::collection(FinancialReports::latest()->get());
        return view('admin.financial-reports-admin', [
            'reports'       => $reports,
        ]);
    }

    public function  store(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_FINANCIAL_REPORTS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($pdf = $request->hasFile('pdf'))
            $pdf = $this->uploadFile($request->file('pdf'));
        $partner = new FinancialReportResources(FinancialReports::create([
            'title'             => [
                'ar'                => $request->title_ar,
                'en'                => $request->title_en,
            ],
            'description'       => [
                'ar'                => $request->descrip_ar,
                'en'                => $request->descrip_en
            ],
            'pdf'               => $pdf,
        ]));
        if ($partner) return redirect()->route('financial-reports')->with('success', __('main.Success'));

        return back()->with(['error' => 'can not inserted']);
    }

    public function  update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_FINANCIAL_REPORTS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $id = $request->reportId;
        $report = FinancialReports::find($id);

        if ($pdf = $request->hasFile('pdf_new'))
            $pdf = $this->uploadFile($request->file('pdf_new'));
        else
            $pdf = $request->pdf;

        $report->title = [
            'ar'            => $request->title_ar,
            'en'            => $request->title_en
        ];
        $report->description = [
            'ar'            => $request->descrip_ar,
            'en'            => $request->descrip_en,
        ];
        $report->pdf = $pdf;
        $update = new FinancialReportResources($report->update());
        if ($update) return redirect()->route('financial-reports')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not updated']);
    }


    public function active(Request $request)
    {
        $active;
        $id = $request->report_active_id;
        $find = new FinancialReportResources(FinancialReports::find($id));
        if ($find->is_active == 0) {
            $active = new FinancialReportResources($find->update(['is_active' => 1]));
        } else {
            $active = new FinancialReportResources($find->update(['is_active' => 0]));
        }
        if ($active) return redirect()->route('financial-reports')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not updated']);
    }

    public function delete(Request $request)
    {
        $id = $request->report_delete_id;
        $find = new FinancialReportResources(FinancialReports::find($id));
        $delete = new FinancialReportResources($find->delete());
        if ($delete) return redirect()->route('financial-reports')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not deleted']);
    }


    public function uploadFile($file)
    {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('pdf'), $filename);
        return $filename;
    }
}
