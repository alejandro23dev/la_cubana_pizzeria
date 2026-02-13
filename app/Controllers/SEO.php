<?php

namespace App\Controllers;

class SEO extends BaseController
{
    public function sitemap()
    {
        $this->response->setHeader('Content-Type', 'text/xml');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml .= '<url>';
        $xml .= '<loc>' . base_url() . '</loc>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';
        $xml .= '</urlset>';

        return $this->response->setBody($xml);
    }
}
