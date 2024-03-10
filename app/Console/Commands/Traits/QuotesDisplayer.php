<?php

namespace App\Console\Commands\Traits;

trait QuotesDisplayer
{
    /**
     * @param mixed $number
     * @param $apiResponse
     * @return void
     */
    private function displayQuotes(mixed $number, $apiResponse): void
    {
        if (is_null($number) || $number == 1) {
            $this->displayQuote($apiResponse);
        } else {
            if ($number > $countQuotes = count($apiResponse)) {
                $this->comment("Il n'y a que {$countQuotes} citations disponibles.");
            }
            foreach ($apiResponse as $quote) {
                $this->displayQuote($quote);
            }
        }
    }

    /**
     * @param array|string $quote
     * @return void
     */
    private function displayQuote(array|string $quote): void
    {
        $this->info("\n{$quote['sentence']}");
        $this->line("{$quote['character']['name']} - alias : {$quote['character']['slug']}\n");
    }
}


