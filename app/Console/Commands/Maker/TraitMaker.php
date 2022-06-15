<?php

namespace App\Console\Commands\Maker;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

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

    protected function buildClass($name)
    {
        $traitNameSpace = $this->getNamespace($name);
        $replace = [];
        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }

   
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
        $path = "";
        $this->info('root name space : '.$this->rootNamespace());
        $this->info('before : '.$name);
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $this->info('after : '.$name);
        $path = $name;
        $this->info($path);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $path).'.php';
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
            ['import', 'i', InputOption::VALUE_NONE, 'create mode'],
            ['export', 'e', InputOption::VALUE_NONE, 'create mode'],
            ['custom', 'c', InputOption::VALUE_NONE, 'create mode'],
        ];
        
    }
}
