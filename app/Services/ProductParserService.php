<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class ProductParserService
{
    public function parseProductData($url)
    {
        $response = Http::get($url);
        if (!$response->successful()) {
            throw new \Exception("HTTP request failed with status: " . $response->status());
        }

        $html = $response->body();
        $crawler = new Crawler($html);

        $price = $this->getElement($crawler, [
            '.prc-box-dscntd',
            '.prc-dscntd',
            '.product-price',
            '.prc-dsc',
            '.detail-name',
            '.product-card__price--new'
        ]);

        $image = $this->getElement($crawler, [
            '.gallery-container img',
            '.swiper-slide .swiper-item img'
        ], ['data-src', 'src']);

        $description = $this->getElement($crawler, [
            '.product-info__title',
            '.product-description',
            '.product-info',
            'h1.pr-new-br span'
        ]);

        return [
            'price' => $price,
            'image' => $image,
            'description' => $description,
        ];
    }

    private function getElement(Crawler $crawler, array $selectors, $attributes = null)
    {
        foreach ($selectors as $selector) {
            $node = $crawler->filter($selector);
            if ($node->count() > 0) {
                if ($attributes) {
                    foreach ((array) $attributes as $attribute) {
                        $value = $node->attr($attribute);
                        if ($value) {
                            return $value;
                        }
                    }
                } else {
                    return trim($node->text());
                }
            }
        }
        return $attributes ? 'Attribute not found' : 'Text not found';
    }
}
