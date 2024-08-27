<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ProductParserService;
use Illuminate\Support\Facades\Http;

class ProductParserServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ProductParserService();
    }

    public function testParseProductDataFromTrendYol()
    {
        $url = 'https://www.trendyol.com/pro-strong-wax/araba-oto-cizik-giderici-oto-bakim-boya-koruma-su-ve-kir-itici-parlatici-wax-pasta-cila-150-ml-p-649372359?boutiqueId=61&merchantId=741509';

        Http::fake([
            $url => Http::response($this->getTrendyolHtml(), 200)
        ]);

        $data = $this->service->parseProductData($url);

        $this->assertNotEmpty($data['price'], 'Price should not be empty for Trendyol');
        $this->assertNotEmpty($data['image'], 'Image URL should not be empty for Trendyol');
        $this->assertNotEmpty($data['description'], 'Description should not be empty for Trendyol');
    }


    private function getTrendyolHtml()
    {
        return '<html>
                    <body>
                        <h1 class="pr-new-br">
                            <a class="product-brand-name-with-link" href="/your-brand">Pro Strong Wax</a>
                            <span>Araba Oto Çizik Giderici Oto Bakım Boya Koruma Su ve Kir İtici Parlatıcı Wax Pasta Cila 150 ML</span>
                        </h1>
                        <div class="gallery-container">
                            <img src="https://cdn.dsmcdn.com/ty1467/product/media/images/prod/QC/20240807/22/16226c43-249f-389f-bab9-3ac70b4008f5/1_org_zoom.jpg" alt="Product Image">
                        </div>
                        <div class="prc-box-dscntd">129.99</div>
                        <div class="product-description">Oto bakım wax\'ı, çizik giderici ve boya koruma özelliklerine sahip.</div>
                    </body>
                </html>';
    }

}
