<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Brief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BriefController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logoService($package, $id)
    {
        $result = self::getBrief($id);
        $isEdit = $result['isEdit'];
        $brief = $result['brief'];

        return view('brief.logo', compact('package', 'isEdit', 'brief', 'id'));
    }

    public function textService($package, $id)
    {
        $result = self::getBrief($id);
        $isEdit = $result['isEdit'];
        $brief = $result['brief'];

        return view('brief.text', compact('package', 'isEdit', 'brief', 'id'));
    }

    public function videoService($package, $id)
    {
        $result = self::getBrief($id);
        $isEdit = $result['isEdit'];
        $brief = $result['brief'];

        return view('brief.video', compact('package', 'isEdit', 'brief', 'id'));
    }

    /**
     * @param $id
     * @return array|\Illuminate\Http\RedirectResponse
     */
    private static function getBrief($id)
    {
        $isEdit = false;
        $isRecordExist = Billing::where('id', $id)->first();
        if (!$isRecordExist) {
            return Redirect::to('/home')->with(['error' => 'Could not found billing detail by ID ' . $id]);
        }
        $brief = Brief::where('billing_id', $id)->first();
        if ($brief) {
            $isEdit = true;
        }
        return ['isEdit' => $isEdit, 'brief' => $brief];
    }

    private function validateData(Request $request)
    {
        $validateData = $request->validate([
            'billing_id' => 'required',
            'company_name' => 'required',
            'company_logo' => 'required|mimes:jpeg,png,jpg|max:2000000',
            'company_website' => '',
            'video_script' => '',
            'artist_gender' => '',
            'artist_accent' => '',
            'voice_type' => '',
            'video_speed' => '',
            'logo_sample' => 'mimes:jpeg,png,jpg|max:2000000',
            'other_info' => '',
        ]);

        return $validateData;
    }

    /**
     * @param Request $request
     * @param Brief $brief
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function createBrief(Request $request, Brief $brief)
    {
        self::validateData($request);
        DB::beginTransaction();

        $companyLogo = '';
        $sampleLogo = '';

        if ($request->hasFile('logo_sample')) {
            $sampleLogo = $request->logo_sample->getClientOriginalName();
            $request->logo_sample->storeAs('public/sample-logos', $sampleLogo);
        }

        if ($request->hasFile('company_logo')) {
            $companyLogo = $request->company_logo->getClientOriginalName();
            $request->company_logo->storeAs('public/company-logos', $companyLogo);
        }

        if (!$brief->create(self::validateData($request))) {
            DB::rollBack();
        }

        $isUpdated = DB::table('billings')
            ->where('id', $request->billing_id)
            ->update(['has_brief' => 1]);
        if (!$isUpdated) {
            DB::rollBack();
        }

        DB::commit();
        return redirect('/brief/completed');
    }

    public function completed()
    {
        return view('brief.complete');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function updateBrief(Request $request)
    {
        $brief = Brief::where('billing_id', request('billing_id'))->first();
        $brief->update(self::validateData($request));

        return redirect('/home')->with(['success' => 'Brief updated successfully']);
    }
}
