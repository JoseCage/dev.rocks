<?php

namespace DevRocks\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceMakeCommand extends GeneratorCommand
{

    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $name = 'make:service';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Create a new Service class.';

    /**
    * The type of class being generated.
    *
    * @var string
    */
    protected $type = 'Service';

    /**
    * Get the stub file for the generator.
    *
    * @return string
    */
    protected function getStub()
    {
        return  __DIR__.'/stubs/service.stub';
    }

    /**
    * Get the default namespace for the class.
    *
    * @param  string  $rootNamespace
    * @return string
    */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
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
