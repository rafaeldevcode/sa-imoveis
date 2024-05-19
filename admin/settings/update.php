<?php

verifyMethod(405, 'POST');

use Src\Models\Setting;

$setting = new Setting();
$requests = requests();
$currentSetting = $setting->first();

$preloader = isset($requests->preloader) ? $requests->preloader : 'off';
$cookies = isset($requests->cookies) ? $requests->cookies : 'off';
$construction = isset($requests->construction) ? $requests->construction : 'off';
$maintenance = isset($requests->maintenance) ? $requests->maintenance : 'off';

$data = [
    'site_name' => $requests->site_name,
    'site_description' => $requests->site_description,
    'andress' => $requests->andress,
    'phone' => $requests->phone,
    'email' => $requests->email,
    'whatsapp' => $requests->whatsapp,
    'telegram' => $requests->telegram,
    'profile_linkedin' => $requests->profile_linkedin,
    'profile_facebook' => $requests->profile_facebook,
    'profile_instagram' => $requests->profile_instagram,
    'profile_twitter' => $requests->profile_twitter,
    'google_analytics_pixel' => $requests->google_analytics_pixel,
    'copyright' => $requests->copyright,
    'telegram_message' => $requests->telegram_message,
    'whatsapp_message' => $requests->whatsapp_message,
    'facebook_pixel' => $requests->facebook_pixel,
    'tiktok_pixel' => $requests->tiktok_pixel,
    'tagmanager_pixel' => $requests->tagmanager_pixel,
    'googleads_pixel' => $requests->googleads_pixel,
    'preloader' => $preloader,
    'cookies' => $cookies,
    'about_company' => $requests->about_company,
    'preloader_image' => $requests->preloader_image ?? 'preloader_default.gif',
    'site_logo_main' => $requests->site_logo_main ?? null,
    'site_logo_secondary' => $requests->site_logo_secondary ?? null,
    'site_favicon' => $requests->site_favicon ?? null,
    'site_bg_login' => $requests->site_bg_login ?? null,
    'home_featured_mob' => $requests->home_featured_mob ?? null,
    'home_featured_desk' => $requests->home_featured_desk ?? null,
    'construction' => $construction,
    'maintenance' => $maintenance,
    'admin_lang' => $requests->admin_lang,
    'cities' => json_encode($requests->cities),
];

if (!isset($currentSetting)) {
    $setting->create($data);
} else {
    $setting->find($currentSetting->id)->update($data);
};

unset($_SESSION['site_settings']);

session([
    'message' => __('Settings updated successfully!'),
    'type' => 'success',
]);

return header(route('/admin/settings', true), true, 302);
