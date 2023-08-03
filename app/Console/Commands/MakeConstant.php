<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeConstant extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:constant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Constant class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Constant';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/constant.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Constants';
    }
}
