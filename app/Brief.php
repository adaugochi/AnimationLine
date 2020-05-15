<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string company_name
 * @property string company_logo
 * @property string company_website
 * @property string video_script
 * @property string artist_gender
 * @property string voice_type
 * @property string other_info
 * @property string artist_accent
 * @property string video_speed
 * @property null logo_sample
 * @property int billing_id
 */
class Brief extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'company_name', 'company_logo', 'company_website', 'video_script', 'artist_gender', 'artist_accent',
        'voice_type', 'video_speed', 'logo_sample', 'other_info', 'billing_id',
    ];

    /**
     * @param $request
     * @param $postRequest
     * @param $billingId
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function create($request, $postRequest, $billingId = null)
    {
        if ($request->hasFile('logo_sample')) {
            $sampleLogo = $request->logo_sample->getClientOriginalName();
            $request->logo_sample->storeAs('public/sample-logos', $sampleLogo);
            $this->logo_sample = $sampleLogo;
        }
        if ($request->hasFile('company_logo')) {
            $companyLogo = $request->company_logo->getClientOriginalName();
            $request->company_logo->storeAs('public/company-logos', $companyLogo);
            $this->company_logo = $companyLogo;
        }

        if (!is_null($billingId)) {
            $this->billing_id = $billingId;
        }
        $this->company_name = $postRequest['company_name'];

        $this->company_website = $postRequest['company_website'];
        $this->video_script = $request->has('video_script') ? $postRequest['video_script'] : null;
        $this->artist_gender = $request->has('artist_gender') ? $postRequest['artist_gender'] : null;
        $this->artist_accent = $request->has('artist_accent') ? $postRequest['artist_accent'] : null;
        $this->voice_type= $request->has('voice_type') ? $postRequest['voice_type'] : null;
        $this->video_speed = $request->has('video_speed') ? $postRequest['video_speed'] : null;

        $this->other_info = $postRequest['other_info'];;
    }
}
