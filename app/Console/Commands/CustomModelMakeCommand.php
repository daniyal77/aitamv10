<?php

namespace App\Console\Commands;


use Illuminate\Support\Str;
use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Exceptions\FileAlreadyExistException;
use Nwidart\Modules\Generators\FileGenerator;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class CustomModelMakeCommand extends GeneratorCommand
{
    use ModuleCommandTrait;

    /**
     * The name of argument name.
     *
     * @var string
     */
    protected $argumentName = 'model';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:make-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model for the specified module.';

    public function handle(): int
    {
        if (parent::handle() === E_ERROR) {
            return E_ERROR;
        }
        $this->getDestinationFilePathService();
        $this->handleOptionalMigrationOption();
        $this->handleOptionalControllerOption();
        $this->handleOptionalSeedOption();
        $this->handleOptionalFactoryOption();
        $this->handleOptionalRequestOption();

        return 0;
    }

    /**
     * Create a proper migration name:
     * ProductDetail: product_details
     * Product: products
     *
     * @return string
     */
    private function createMigrationName()
    {
        $pieces = preg_split('/(?=[A-Z])/', $this->argument('model'), -1, PREG_SPLIT_NO_EMPTY);

        $string = '';
        foreach ($pieces as $i => $piece) {
            if ($i + 1 < count($pieces)) {
                $string .= strtolower($piece) . '_';
            } else {
                $string .= Str::plural(strtolower($piece));
            }
        }

        return $string;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['model', InputArgument::REQUIRED, 'The name of model will be created.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will be used.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['fillable', null, InputOption::VALUE_OPTIONAL, 'The fillable attributes.', null],
            ['migration', 'm', InputOption::VALUE_NONE, 'Flag to create associated migrations', null],
            ['controller', 'c', InputOption::VALUE_NONE, 'Flag to create associated controllers', null],
            ['seed', 's', InputOption::VALUE_NONE, 'Create a new seeder for the model', null],
            ['factory', 'f', InputOption::VALUE_NONE, 'Create a new factory for the model', null],
            ['request', 'r', InputOption::VALUE_NONE, 'Create a new request for the model', null],
        ];
    }

    /**
     * Create the migration file with the given model if migration flag was used
     */
    private function handleOptionalMigrationOption()
    {
        if ($this->option('migration') === true) {
            $migrationName = 'create_' . $this->createMigrationName() . '_table';
            $this->call('module:make-migration', ['name' => $migrationName, 'module' => $this->argument('module')]);
        }
    }

    /**
     * Create the controller file for the given model if controller flag was used
     */
    private function handleOptionalControllerOption()
    {
        if ($this->option('controller') === true) {
            $controllerName = "{$this->getModelName()}Controller";

            $this->call('module:make-controller', array_filter([
                'controller' => $controllerName,
                'module'     => $this->argument('module'),
            ]));
        }
    }

    /**
     * Create a seeder file for the model.
     *
     * @return void
     */
    protected function handleOptionalSeedOption()
    {
        if ($this->option('seed') === true) {
            $seedName = "{$this->getModelName()}Seeder";

            $this->call('module:make-seed', array_filter([
                'name'   => $seedName,
                'module' => $this->argument('module')
            ]));
        }
    }

    /**
     * Create a seeder file for the model.
     *
     * @return void
     */
    protected function handleOptionalFactoryOption()
    {
        if ($this->option('factory') === true) {
            $this->call('module:make-factory', array_filter([
                'name'   => $this->getModelName(),
                'module' => $this->argument('module')
            ]));
        }
    }

    /**
     * Create a request file for the model.
     *
     * @return void
     */
    protected function handleOptionalRequestOption()
    {
        if ($this->option('request') === true) {
            $requestName = "{$this->getModelName()}Request";

            $this->call('module:make-request', array_filter([
                'name'   => $requestName,
                'module' => $this->argument('module')
            ]));
        }
    }

    /**
     * @return mixed
     */
    protected function getTemplateContents()
    {
        $module = $this->laravel['modules']->findOrFail($this->getModuleName());
        return (new Stub('/model.stub', [
            'NAME'             => $this->getModelName(),
            'FILLABLE'         => $this->getFillable(),
            'NAMESPACE'        => $this->getClassNamespace($module),
            'CLASS'            => $this->getClass(),
            'LOWER_NAME'       => $module->getLowerName(),
            'MODULE'           => $this->getModuleName(),
            'STUDLY_NAME'      => $module->getStudlyName(),
            'MODULE_NAMESPACE' => $this->laravel['modules']->config('namespace'),
        ]))->render();
    }

    /**
     * @return mixed
     */
    protected function getDestinationFilePath()
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $modelPath = GenerateConfigReader::read('model');

        return $path . $modelPath->getPath() . '/' . $this->getModelName() . '.php';
    }

    /**
     * @return mixed|string
     */
    private function getModelName()
    {
        return Str::studly($this->argument('model'));
    }

    /**
     * @return string
     */
    private function getFillable()
    {
        $fillable = $this->option('fillable');

        if (!is_null($fillable)) {
            $arrays = explode(',', $fillable);

            return json_encode($arrays);
        }

        return '[]';
    }

    /**
     * Get default namespace.
     *
     * @return string
     */
    public function getDefaultNamespace(): string
    {
        $module = $this->laravel['modules'];
        return $module->config('paths.generator.model.namespace')
            ?: $module->config(
                'paths.generator.model.path', 'Entities');
    }

    private function createServices(): string
    {
        return (new Stub('/service.stub', [
            'NAME'  => $this->getModelName() . "Service",
            'CLASS' => $this->getModelName() . "Service",

            'CLASS_RELATIONS_SHIPS' => $this->getModelName() . "Relational",
            'CLASS_FIELDS'          => $this->getModelName() . "Fields",
            'CLASS_CACHE'           => $this->getModelName() . "Cache",
            'FOLDER_NAME'           => $this->getModelName(),

            'NAMESPACE'   => "Modules\\" . $this->getModuleName() . "\App\Services",
            'CLASS_MODEL' => $this->getModelName(),
            'MODULE_NAME' => $this->getModuleName(),
        ]))->render();
    }

    private function createServicesTrait($name): string
    {
        return (new Stub('/service-relationships.stub', [
            'CLASS'     => $this->getModelName() . $name,
            'NAMESPACE' => "Modules\\" . $this->getModuleName() . "\App\Services\\Traits\\" . $this->getModelName(),
        ]))->render();
    }

    private function getDestinationFilePathService()
    {
        try {
            $path = $this->laravel['modules']->getModulePath($this->getModuleName());
            $modelPath = GenerateConfigReader::read('service');

            $path = $path . $modelPath->getPath() . '/' . $this->getModelName() . 'Service' . '.php';
            $path = str_replace('\\', '/', $path);

            $pathTrait = $this->FilePath('Fields', $modelPath);
            $pathTraitRelational = $this->FilePath('Relational', $modelPath);
            $pathTraitCache = $this->FilePath('Cache', $modelPath);

            $this->createMkDir($path);
            $this->createMkDir($pathTraitRelational);
            $this->createMkDir($pathTraitCache);
            $this->createMkDir($pathTrait);

            $contents = $this->createServices();
            $this->components->task("Generating file {$path}", function () use ($path, $contents) {
                $overwriteFile = $this->hasOption('force') ? $this->option('force') : false;
                (new FileGenerator($path, $contents))->withFileOverwrite($overwriteFile)->generate();
            });

            $this->createTraitDetail('Fields', $pathTrait);
            $this->createTraitDetail('Relational', $pathTraitRelational);
            $this->createTraitDetail('Cache', $pathTraitCache);
        } catch (FileAlreadyExistException $e) {
            $this->components->error("File : {$path} already exists.");

            return E_ERROR;
        }

    }

    /**
     * ایجاد محتوای فایل ها
     *
     * @param $Fields
     * @param $pathTrait
     *
     * @return void
     */
    private function createTraitDetail($Fields, $pathTrait): void
    {
        $contentFields = $this->createServicesTrait($Fields);
        $this->components->task("Generating file {$pathTrait}", function () use ($pathTrait, $contentFields) {
            $overwriteFile = $this->hasOption('force') ? $this->option('force') : false;
            (new FileGenerator($pathTrait, $contentFields))->withFileOverwrite($overwriteFile)->generate();
        });
    }

    /**
     * ساخت پوشه
     *
     * @param $path
     *
     * @return void
     */
    private function createMkDir($path): void
    {
        if (!$this->laravel['files']->isDirectory($dir = dirname($path)))
            $this->laravel['files']->makeDirectory($dir, 0777, true);

    }


    /**
     * مسیر فایل را برای یک تریت مرتبط با کلاس سرویس ایجاد می‌کند.
     *
     * @param $namFile
     * @param $modelPath
     *
     * @return string
     */
    private function FilePath($namFile, $modelPath): string
    {
        $modelPath = GenerateConfigReader::read('service');
        return $this->laravel['modules']
                   ->getModulePath($this->getModuleName()) .
               $modelPath->getPath() . '/Traits/' .
               $this->getModelName() . '/' .
               $this->getModelName() .
               $namFile . ".php";
    }

}

