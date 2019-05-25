<?php

namespace DevRocks\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ControllerrMakeCommand extends GeneratorCommand
{

    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $name = 'make:controllerr';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Create a new Controller class.';

    /**
    * The type of class being generated.
    *
    * @var string
    */
    protected $type = 'Controller';

    /**
    * Get the stub file for the generator.
    *
    * @return string
    */
    protected function getStub()
    {
        return  __DIR__.'/stubs/controller.stub';
    }

    /**
    * Get the default namespace for the class.
    *
    * @param  string  $rootNamespace
    * @return string
    */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Support\Http\Controllers';
    }

    /**
    * Get the console command options.
    *
    * @return array
    */
    protected function getOptions()
    {
        return [];
    }
}
