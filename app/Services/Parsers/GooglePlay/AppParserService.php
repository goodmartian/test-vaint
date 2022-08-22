<?php

namespace App\Services\Parsers\GooglePlay;

use Symfony\Component\DomCrawler\Crawler;

class AppParserService
{
    private string $appName;
    private Crawler $crawler;

    /**
     * @param string|null $appName
     * @return AppParserService
     * @throws \Exception
     */
    public function setAppName(null|string $appName): static
    {
        if (is_null($appName)) {
            throw new \Exception(__('parsers.app.name_not_set'));
        }

        $this->appName = $appName;

        return $this;
    }

    /**
     * TODO: Move file_get_contents call to a separate method
     *
     * @return $this
     * @throws \Exception
     */
    public function parse(): static
    {
        $appUrl = config('parsers.google_play.app_details.url') . $this->appName;

        try {
            $html = file_get_contents($appUrl);
        } catch (\Exception $e) {
            throw new \Exception(__('parsers.app.not_found'));
        }

        $this->crawler = new Crawler($html);

        return $this;
    }

    /**
     * @return string
     */
    public function getAppIcon(): string
    {
        return $this->crawler
            ->selectImage(config('parsers.google_play.app_details.icon_alt'))
            ->first()
            ->attr('src');
    }
}
