<?php

namespace App\Console\Commands\Maker;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TraitMaker extends GeneratorCommand
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:trait';

    protected $type = "Trait";

    protected const MODE = [
       'import',
        'export',
        'custom'
    ];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
   
    protected function getStub()
    {
        foreach(static::MODE as $mode){
            if($this->option($mode))
            return __DIR__.'/../stubs/trait/'.$mode.'.stub';
        }
        return __DIR__.'/../stubs/trait/default.stub';
        
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }
    
   
    protected function getDefaultNamespace($rootNamespace)
    {   
        foreach(static::MODE as $mode){
            if($this->option($mode)){
                return $rootNamespace.'\Trait'."\\".ucfirst($mode);
            }
        }
        return $rootNamespace.'\Trait';
    }

    protected function getOptions()
    {
        return [
            ['import', 'i', InputOption::VALUE_NONE, 'Create A Import Trait'],
            ['export', 'e', InputOption::VALUE_NONE, 'Create A Export Trait'],
            ['custom', 'c', InputOption::VALUE_NONE, 'Create A Custom Trait'],
        ];
        
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the trait'],
        ];
    }
}
