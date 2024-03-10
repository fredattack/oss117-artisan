<?php

namespace App\Console\Commands\Traits;

use App\Facades\Oss117Api;

trait ManageCharacters
{
    /**
     * @return void
     */
    private function manageCharacters(): void
    {
        $this->line("Liste des personnages disponibles\n");
        $characters = $this->getCharacters();

        $this->displayCharacters($characters);
    }

    /**
     * @return array
     */
    private function getCharacters(): array
    {
        return Oss117Api::fetchCharacters();
    }

    /**
     * @param array $characters
     * @return void
     */
    private function displayCharacters(array $characters): void
    {
        foreach ($characters as $index => $character) {
            $this->displayCharacter($character);

            $lastElement = $index === count($characters) - 1;
            if ($lastElement) {
                $this->line("\n");
            }
        }
    }

    /**
     * @param array $character
     * @return void
     */
    private function displayCharacter(array $character): void
    {
        $this->info("{$character['name']} - alias : {$character['slug']}");
    }
}
