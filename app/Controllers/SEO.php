<?php

namespace App\Controllers;

class SEO extends BaseController
{
    public function sitemap()
    {
        $urls[0] = ['loc' => base_url('/'), 'lastmod' => date('Y-m-d'), 'changefreq' => 'weekly', 'priority' => '0.8'];
        $xml = view('sitemap', ['urls' => $urls]);

        return $this->response->setHeader('Content-Type', 'application/xml')->setBody($xml);
    }
}
