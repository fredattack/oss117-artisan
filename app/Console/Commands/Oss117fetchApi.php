<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\ArgumentManager;
use App\Console\Commands\Traits\ManageCharacters;
use App\Console\Commands\Traits\QuotesDisplayer;
use App\Facades\Oss117Api;
use Illuminate\Console\Command;

/**
 *
 */
class Oss117fetchApi extends Command
{
    use ArgumentManager;
    use ManageCharacters;
    use QuotesDisplayer;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oss117:quotes
                        {--number=null : Le nombre de citations à afficher}
                        {--character=null : Le personnage dont on veut afficher les citations}
                        {--characters=false : (à utiliser sans argument)Affiche la liste des personnages disponibles}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cet outil Artisan est conçu pour les fans et les enthousiastes de la série OSS 117, fournissant un moyen simple et interactif de récupérer des citations mémorables des films d\'espionnage français bien-aimés. Si Aucune option n\'est fournie, une invite de commande vous permet d\'affiner votre recherche.';


    /**
     * @return void
     */
    public function handle()
    {
        $characters = $this->option('characters') != "false";

        if ($characters) {
            $this->manageCharacters();
            return;
        }

        $params = $this->manageArguments();

        $apiResponse = Oss117Api::fetchQuotes($params);

        if ($apiResponse instanceof \Exception) {
            $this->error($apiResponse->getMessage());
            return;
        }

        $this->displayQuotes($params['number'], $apiResponse);
    }








}
