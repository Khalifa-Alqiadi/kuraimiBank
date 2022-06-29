<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\ValidateEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\OurParter as OurPartnerResources;
use App\Models\OurPartner;

class ApiOurPartners extends Controller
{
    //
    public function ShowPartners()
    {
        $partner = OurPartnerResources::collection(OurPartner::latest()->get());
        return view('admin.our-partners-admin', ['partaner' => $partner]);
    }

    public function  store(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_OUR_PARTNERS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($image = $request->hasFile('image'))
            $image = $this->uploadFile($request->file('image'));
        $partner = OurPartner::create([
            'title'             => [
                'ar'                => $request->title_ar,
                'en'                => $request->title_en,
            ],
            'description'       => [
                'ar'                => $request->descrip_ar,
                'en'                => $request->descrip_en
            ],
            'image'             => $image,
        ]);
        if ($partner) return redirect()->route('our_partners')->with('success', __('main.Success'));

        return back()->with(['error' => 'can not inserted']);
    }
    public function  update(Request $request)
    {
        $error = new ValidateEnum;
        $validate = Validator::make($request->all(), ValidateEnum::REQUIRED_OUR_PARTNERS, $error->required());
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $id = $request->partanerId;
        $partner = OurPartner::find($id);

        if ($image = $request->hasFile('image'))
            $image = $this->uploadFile($request->file('image'));

        $partner->title = [
            'ar'            => $request->title_ar,
            'en'            => $request->title_en
        ];
        $partner->description = [
            'ar'            => $request->descrip_ar,
            'en'            => $request->descrip_en,
        ];
        $partner->image = $image;
        $update = new OurPartnerResources($partner->update());
        if ($update) return redirect()->route('our_partners')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not inserted']);
    }

    public function active(Request $request)
    {
        $active;
        $id = $request->partaner_active_id;
        $find = new OurPartnerResources(OurPartner::find($id));
        if ($find->is_active == 0) {
            $active = new OurPartnerResources($find->update(['is_active' => 1]));
        } else {
            $active = new OurPartnerResources($find->update(['is_active' => 0]));
        }
        if ($active) return redirect()->route('our_partners')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not updated']);
    }

    public function delete(Request $request)
    {
        $id = $request->partaner_delete_id;
        $find = new OurPartnerResources(OurPartner::find($id));
        $delete = new OurPartnerResources($find->delete());
        if ($delete) return redirect()->route('our_partners')->with('success', __('main.Success'));
        return back()->with(['error' => 'can not deleted']);
    }

    public function uploadFile($file)
    {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        return $filename;
    }
}
