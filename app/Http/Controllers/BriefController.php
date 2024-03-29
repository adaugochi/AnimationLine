<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Brief;
use App\Contants\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BriefController extends Controller
{
    const HOME_URL = '/home';
    /**
     * BriefController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * @param $package
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function logoService($package, $id)
    {
        $result = self::getBrief($id);
        $isEdit = $result['isEdit'];
        $brief = $result['brief'];

        return view('brief.logo', compact('package', 'isEdit', 'brief', 'id'));
    }

    /**
     * @param $package
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function textService($package, $id)
    {
        $result = self::getBrief($id);
        $isEdit = $result['isEdit'];
        $brief = $result['brief'];

        return view('brief.text', compact('package', 'isEdit', 'brief', 'id'));
    }

    /**
     * @param $package
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
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
            return Redirect::to(self::HOME_URL)->with(['error' => Message::BILLING_NOT_FOUND]);
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
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,svg,gif,webp|max:2048',
            'logo_sample' => 'image|mimes:jpeg,png,jpg,svg,gif,webp|max:2048'
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
        $billingId = $request->billing_id;

        try {
            $brief->create($request, $request->all(), $billingId);
            $brief->save();

            $billing = $brief->billing;
            $billing->status = Billing::IN_PROGRESS;
            $billing->has_brief = Billing::YES;
            $billing->save();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect(self::HOME_URL)->with(['error' => Message::BRIEF_NOT_SAVE]);
        }

        DB::commit();
        return redirect('/brief/completed');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
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
        if (!$brief) {
            return redirect()->with(['error' => Message::BRIEF_NOT_FOUND]);
        }

        $brief->create($request, $request->all());
        if (!$brief->save()) {
            return redirect(self::HOME_URL)->with(['error' => Message::BRIEF_NOT_UPDATE]);
        }
        return redirect(self::HOME_URL)->with(['success' => 'Brief updated successfully']);
    }
}
