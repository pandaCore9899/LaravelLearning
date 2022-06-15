<?php

namespace App\Console\Commands\Maker;

use Illuminate\Console\Command;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Support\Str;
use InvalidArgumentException;

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
        $type = $this->option('type');
        $stubPath = __DIR__."/../stubs/controller/controller.{$type}.stub";
        return $stubPath;
    }

    /**
     * Build the class with the given name.
     *
     * Remove the base controller import if we are already in the base namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $controllerNamespace = $this->getNamespace($name);

        $replace = [];
        if ($this->option('import')) {
            $replace = $this->buildImportReplacements();
        }
        if ($this->option('parent')) {
            $replace = $this->buildParentReplacements();
        }

        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        $replace["use {$controllerNamespace}\Controller;\n"] = '';

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }



    protected function buildImportReplacements(){
        $importClass = $this->option('import');

    }

     /**
     * Get the fully-qualified model class name.
     *
     * @param  string  $model
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function parseImport($import)
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $import)) {
            throw new InvalidArgumentException('Import name contains invalid characters.');
        }

        return $this->qualifyImport($import);
    }

    /**
     * Qualify the given model class base name.
     *
     * @param  string  $model
     * @return string
     */
    protected function qualifyImport(string $import)
    {
        $import = ltrim($import, '\\/');

        $import = str_replace('/', '\\', $import);

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($import, $rootNamespace)) {
            return $import;
        }

        return is_dir(app_path('Http\\Trait\\Import'))
                    ? $rootNamespace.'Http\\Trait\\Import\\'.$import
                    : $rootNamespace.$import;
    }
}
