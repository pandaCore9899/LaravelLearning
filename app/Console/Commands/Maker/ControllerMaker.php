<?php

namespace App\Console\Commands\Maker;

use Illuminate\Console\Command;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Illuminate\Support\Facades\Artisan;

class ControllerMaker extends ControllerMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'panda:make:controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected function getStub()
    {
        $type = $this->option('type') ? $this->option('type') : 'default';
        $stubPath = __DIR__ . "/../stubs/controller/controller.{$type}.stub";
        return $stubPath;
    }

    protected function buildClass($name)
    {
        $controllerNamespace = $this->getNamespace($name);
        $importerPath = $this->qualifyImporter($name.'Importer');
        if($this->option('type') == 'import'){
            $this->call('make:trait',['name' => $importerPath]);
        }

        $replace = [];

        if ($this->option('parent')) {
            $replace = $this->buildParentReplacements();
        }

        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }else{
            $replace["protected \$model = {{model}};\n"] = '';
            $replace["use {{ namespacedModel}};\n"] = '';
        }

        $replace["use {$controllerNamespace}\Controller;\n"] = '';

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }
   
    protected function qualifyImporter(string $importer)
    {
        $importer = ltrim($importer, '\\/');

        $importer = str_replace('/', '\\', $importer);

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($importer, $rootNamespace)) {
            return $importer;
        }
        $this->info(is_dir(app_path('Trait')));
        return is_dir(app_path('Trait'))
                    ? $rootNamespace.'Trait\\'.$importer
                    : $rootNamespace.$importer;
    }

}
