<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class DTOMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:dto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new dto class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    protected $type = 'DTO';

    protected function getStub()
    {
        return __DIR__.'/stubs/dto.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\DTO';
    }
}
