<?php

namespace App\Console\Commands\Traits;

trait ArgumentManager
{
    /**
     * @return array
     */
    private function manageArguments(): array
    {
        $number = $this->option('number') == 'null' ? null : $this->option('number');
        $character = $this->option('character') == 'null' ? null : $this->option('character');

        if ($number === null) {
            $number = $this->askForNumber($number);
        }

        if ($character === null) {
            $character = $this->askForCharacter($number);
        }
        return ['number' => $number, 'character' => $character];
    }

    /**
     * @param int $number
     * @return mixed|string|null
     */
    protected function askForCharacter(int $number)
    {
        $citationsText = $number == 1 ? 'la citation' : 'les citations';
        $valid = false;

        $charactersArray = collect($this->getCharacters())->pluck('slug')->toArray();

        while (!$valid) {
            $character = $this->ask("De quel personnage voulez-vous afficher {$citationsText}?", 'non');

            if (in_array($character, $charactersArray) || $character === 'non') {
                $character = $character === 'non' ? null : $character;
                $valid = true;
            } else {
                $this->comment("Le personnage demandé n'existe pas. Veuillez réessayer en utilisant un alias valide.");
                $this->manageCharacters();
            }
        }

        return $character;
    }


    /**
     * @param int|null $number
     * @return int|null
     */
    protected function askForNumber(?int $number)
    {
        $isValid = false;

        while (!$isValid) {
            // Ask the user for input
            $input = $this->ask('Combien de citations voulez-vous afficher?', '1');

            // Check if the input is an integer
            if (is_numeric($input) && (int)$input == $input) {
                $number = (int)$input; // Cast to integer
                $isValid = true; // Valid input
            } else {
                $this->error('Veuillez entrer un nombre entier.');
            }
        }

        return $number;
    }
}
