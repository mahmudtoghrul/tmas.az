<?php

namespace Admin;

use App\Models\Setting;
use Core\CSRF;
use Core\View;

class HomepageController
{
    private array $imageKeys = [
        'home_slide1_image', 'home_slide2_image', 'home_slide3_image',
        'home_tab1_image', 'home_tab2_image', 'home_tab3_image', 'home_tab4_image', 'home_tab5_image',
        'home_case1_image', 'home_case2_image', 'home_case3_image',
    ];

    /**
     * Homepage section keys grouped by section.
     * Each key gets _az, _ru, _en suffixes for multilingual support.
     */
    private array $sections = [
        'slides' => [
            'home_slide1_label', 'home_slide1_title', 'home_slide1_text',
            'home_slide2_label', 'home_slide2_title', 'home_slide2_text',
            'home_slide3_label', 'home_slide3_title', 'home_slide3_text',
        ],
        'tabs' => [
            'home_tab1_name', 'home_tab1_title', 'home_tab1_desc',
            'home_tab1_item1', 'home_tab1_item2', 'home_tab1_item3', 'home_tab1_item4',
            'home_tab2_name', 'home_tab2_title', 'home_tab2_desc',
            'home_tab2_item1', 'home_tab2_item2', 'home_tab2_item3', 'home_tab2_item4',
            'home_tab3_name', 'home_tab3_title', 'home_tab3_desc',
            'home_tab3_item1', 'home_tab3_item2', 'home_tab3_item3', 'home_tab3_item4',
            'home_tab4_name', 'home_tab4_title', 'home_tab4_desc',
            'home_tab4_item1', 'home_tab4_item2', 'home_tab4_item3', 'home_tab4_item4',
            'home_tab5_name', 'home_tab5_title', 'home_tab5_desc',
            'home_tab5_item1', 'home_tab5_item2', 'home_tab5_item3', 'home_tab5_item4',
        ],
        'process' => [
            'home_process_label', 'home_process_title',
            'home_process_step1_title', 'home_process_step1_text',
            'home_process_step2_title', 'home_process_step2_text',
            'home_process_step3_title', 'home_process_step3_text',
            'home_process_step4_title', 'home_process_step4_text',
        ],
        'cases' => [
            'home_case1_category', 'home_case1_title', 'home_case1_text',
            'home_case1_stat1_value', 'home_case1_stat1_label',
            'home_case1_stat2_value', 'home_case1_stat2_label',
            'home_case2_category', 'home_case2_title', 'home_case2_text',
            'home_case2_stat1_value', 'home_case2_stat1_label',
            'home_case2_stat2_value', 'home_case2_stat2_label',
            'home_case3_category', 'home_case3_title', 'home_case3_text',
            'home_case3_stat1_value', 'home_case3_stat1_label',
            'home_case3_stat2_value', 'home_case3_stat2_label',
        ],
        'testimonials' => [
            'home_testimonial1_text', 'home_testimonial1_name', 'home_testimonial1_role', 'home_testimonial1_initials',
            'home_testimonial2_text', 'home_testimonial2_name', 'home_testimonial2_role', 'home_testimonial2_initials',
            'home_testimonial3_text', 'home_testimonial3_name', 'home_testimonial3_role', 'home_testimonial3_initials',
        ],
        'about' => [
            'home_about_title', 'home_about_text',
            'home_stat1_value', 'home_stat1_label',
            'home_stat2_value', 'home_stat2_label',
            'home_stat3_value', 'home_stat3_label',
        ],
        'cta' => [
            'home_cta_title', 'home_cta_text', 'home_cta_button',
        ],
    ];

    public function index(): void
    {
        $data = [];
        $langs = ['az', 'ru', 'en'];

        foreach ($this->sections as $section => $keys) {
            foreach ($keys as $key) {
                if ($this->isLangIndependent($key)) {
                    $data[$key] = Setting::get($key);
                } else {
                    foreach ($langs as $lang) {
                        $data[$key . '_' . $lang] = Setting::get($key . '_' . $lang);
                    }
                }
            }
        }

        foreach ($this->imageKeys as $key) {
            $data[$key] = Setting::get($key);
        }

        View::adminRender('homepage/index', [
            'title' => 'Ana Səhifə',
            'data' => $data,
            'sections' => $this->sections,
        ]);
    }

    public function store(): void
    {
        if (!CSRF::verify()) {
            flash_set('error', 'CSRF xətası');
            redirect('/admin/homepage');
        }

        $langs = ['az', 'ru', 'en'];

        foreach ($this->sections as $section => $keys) {
            foreach ($keys as $key) {
                if ($this->isLangIndependent($key)) {
                    if (isset($_POST[$key])) {
                        Setting::set($key, trim($_POST[$key]));
                    }
                } else {
                    foreach ($langs as $lang) {
                        $fullKey = $key . '_' . $lang;
                        if (isset($_POST[$fullKey])) {
                            Setting::set($fullKey, trim($_POST[$fullKey]));
                        }
                    }
                }
            }
        }

        foreach ($this->imageKeys as $key) {
            if (!empty($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
                $path = upload_file($_FILES[$key], 'uploads/homepage');
                if ($path) {
                    Setting::set($key, $path);
                }
            }
        }

        flash_set('success', 'Ana səhifə uğurla yeniləndi');
        redirect('/admin/homepage');
    }

    private function isLangIndependent(string $key): bool
    {
        if (str_contains($key, '_initials')) return true;
        if (preg_match('/home_case\d+_stat\d+_(value|label)/', $key)) return true;
        if (preg_match('/home_stat\d+_value/', $key)) return true;
        return false;
    }
}
