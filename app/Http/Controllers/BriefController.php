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

    public function videoBronze($id)
    {

    }

    public function videoSilver($id)
    {

    }

    public function videoGold($id)
    {
        $result = self::getBrief($id);
        dd($result);
    }

    public function logoBronze($id)
    {

    }

    public function logoSilver($id)
    {

    }

    public function logoGold($id)
    {
        dd($id);
    }

    public function textBronze($id)
    {

    }

    public function textSilver($id)
    {

    }

    public function textGold($id)
    {
        dd($id);
    }

    /**
     * @param $id
     * @return array|\Illuminate\Http\RedirectResponse
     */
    private static function getBrief($id)
    {
        $email = auth()->user()->email;
        $fullName = auth()->user()->getFullName();
        $isEdit = false;
        $isRecordExist = Billing::where('id', $id)->first();
        if (!$isRecordExist) {
            return Redirect::to('/home')->with(['error' => 'Could not found billing detail by ID ' . $id]);
        }
        $brief = Brief::where('billing_id', $id)->first();
        if ($brief) {
            $isEdit = true;
        }
        return ['isEdit' => $isEdit, 'email' => $email, 'fullName' => $fullName, 'brief' => $brief];
    }

    private function validateData(Request $request)
    {
        $validateData = $request->validate([
            'billing_id' => 'required',
            'app_full_name' => 'required',
            'country_accent' => 'required',
            'voiceover_artist' => 'required',
            'website' => '',
            'description' => 'required'
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
        DB::beginTransaction();

        if (!$brief->create(self::validateData($request))) {
            DB::rollBack();
        }

        $isUpdated = DB::table('billings')->where('id', $request->billing_id)->update(['has_brief' => 1]);
        if (!$isUpdated) {
            DB::rollBack();
        }

        DB::commit();
        return redirect('/home')->with(['success' => 'Brief completed successfully']);

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
