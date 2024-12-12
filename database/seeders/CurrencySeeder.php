<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['quantity' => 1, 'name' => 'Euro', 'code' => 'EUR', 'rate' => 41.71],
            ['quantity' => 1, 'name' => 'Dollar US', 'code' => 'USD', 'rate' => 39.68],
            ['quantity' => 1, 'name' => 'Livre sterling', 'code' => 'GBP', 'rate' => 50.56],
            ['quantity' => 100, 'name' => 'Franc suisse', 'code' => 'CHF', 'rate' => 4492.8],
            ['quantity' => 1, 'name' => 'Dollar canadien', 'code' => 'CAD', 'rate' => 27.99],
            ['quantity' => 100, 'name' => 'Couronne suédoise', 'code' => 'SEK', 'rate' => 361.69],
            ['quantity' => 100, 'name' => 'Couronne norvégienne', 'code' => 'NOK', 'rate' => 355.92],
            ['quantity' => 100, 'name' => 'Couronne danoise', 'code' => 'DKK', 'rate' => 559.26],
            ['quantity' => 1000, 'name' => 'Franc CFA BCEAO', 'code' => 'XOF', 'rate' => 63.87],
            ['quantity' => 100, 'name' => 'Dirham marocain', 'code' => 'MAD', 'rate' => 397.71],
            ['quantity' => 1000, 'name' => 'Yen japonais', 'code' => 'JPY', 'rate' => 260.00],
            ['quantity' => 1, 'name' => 'Riyal saoudien', 'code' => 'SAR', 'rate' => 10.56],
            ['quantity' => 1, 'name' => 'Dinar koweïtien', 'code' => 'KWD', 'rate' => 128.99],
            ['quantity' => 1, 'name' => 'Yuan renminbi chinois', 'code' => 'CNY', 'rate' => 5.47],
            ['quantity' => 1, 'name' => 'Dirham des Émirats Arabes Unis', 'code' => 'AED', 'rate' => 10.80],
            ['quantity' => 1, 'name' => 'Droits de Tirages Spéciaux', 'code' => 'XDR', 'rate' => 52.26],
            ['quantity' => 1, 'name' => 'Dinar tunisien', 'code' => 'TND', 'rate' => 12.56],
            ['quantity' => 1, 'name' => 'Dinar algérien', 'code' => 'DZD', 'rate' => 0.30],
            ['quantity' => 1, 'name' => 'Dinar libyen', 'code' => 'LYD', 'rate' => 8.15],
        ];

        foreach ($currencies as $currency) {
            Currency::updateOrCreate(
                ['code' => $currency['code']], // Check for existing currency by code
                $currency // Update or create new record
            );
        }
    }
}
