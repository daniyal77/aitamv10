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



class ServicesCommand extends GeneratorCommand
{
    use ModuleCommandTrait;


    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'service';


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-service {service : The name of the service class.} {module : The name of the module will be used.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service for the specified module.';


    public function handle(): int
    {
        if (parent::handle() === E_ERROR) {
            return E_ERROR;
        }
        $this->getDestinationFilePathService();
        return 0;
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['service', InputArgument::REQUIRED, 'The name of the controller class.'],
            ['module', InputArgument::REQUIRED, 'The name of module will be used.'],
        ];
    }

    /**
     * دریافت محتوای قالب
     *
     * @return string
     */
    protected function getTemplateContents(): string
    {

        return (new Stub('/service-without-model.stub', [
            'NAME'                  => $this->getServiceName() . "Service",
            'CLASS'                 => $this->getServiceName() . "Service",
            'FOLDER_NAME'           => $this->getServiceName(),
            'CLASS_RELATIONS_SHIPS' => $this->getServiceName() . "Relational",
            'CLASS_FIELDS'          => $this->getServiceName() . "Fields",
            'CLASS_CACHE'           => $this->getServiceName() . "Cache",

            'NAMESPACE'   => "Modules\\" . $this->getModuleName() . "\App\Services",
            'CLASS_MODEL' => $this->getServiceName(),
            'MODULE_NAME' => $this->getServiceName(),
        ]))->render();
    }

    /**
     * مسیر فایل مقصد را دریافت کنید
     *
     * @return string
     */
    protected function getDestinationFilePath(): string
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());
        $ServicePath = GenerateConfigReader::read('service');
        return $path . $ServicePath->getPath() . '/' . $this->getServiceName() . "Service" . '.php';
    }

    /**
     * ساختن فایل trait
     *
     * @param $name
     *
     * @return string
     */
    private function createServicesTrait($name): string
    {
        return (new Stub('/service-relationships.stub', [
            'CLASS'     => $this->getServiceName() . $name,
            'NAMESPACE' => "Modules\\" . $this->getModuleName() . "\App\Services\\Traits\\" . $this->getServiceName(),
        ]))->render();
    }

    private function getServiceName(): string
    {
        return Str::studly($this->argument('service'));
    }

    /**
     * وظایف اضافی مربوط به تولید فایل، از جمله ایجاد دایرکتوری‌ها و محتوای کلاس سرویس را انجام می‌دهد.
     *
     * @return int|void
     */
    private function getDestinationFilePathService()
    {
        try {
            $path = $this->laravel['modules']->getModulePath($this->getModuleName());

            $pathTrait = $this->FilePath('Fields');
            $pathTraitRelational = $this->FilePath('Relational');
            $pathTraitCache = $this->FilePath('Cache');

            $this->createMkDir($pathTraitCache);
            $this->createMkDir($pathTraitRelational);
            $this->createMkDir($pathTrait);

            $this->createTraitDetail('Fields', $pathTrait);
            $this->createTraitDetail('Relational', $pathTraitRelational);
            $this->createTraitDetail('Cache', $pathTraitCache);
        } catch (FileAlreadyExistException $e) {
            $this->components->error("File : {$path} already exists.");
            return E_ERROR;
        }
    }

    /**
     * محتوای یک فایل تریت خاص مرتبط با کلاس سرویس را تولید می‌کند.
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
     * اگر وجود نداشته باشد، یک دایرکتوری را ایجاد می‌کند.
     *
     * @param $path
     *
     * @return void
     */
    private function createMkDir($path): void
    {
        if (!$this->laravel['files']->isDirectory($dirs = dirname($path)))
            $this->laravel['files']->makeDirectory($dirs, 0777, true);

    }

    /**
     * مسیر فایل را برای یک تریت مرتبط با کلاس سرویس ایجاد می‌کند.
     *
     * @param $namFile
     *
     * @return string
     */
    private function FilePath($namFile): string
    {
        $modelPath = GenerateConfigReader::read('service');
        return $this->laravel['modules']
                   ->getModulePath($this->getModuleName()) .
               $modelPath->getPath() . '/Traits/' .
               $this->getServiceName() . '/' .
               $this->getServiceName() .
               $namFile . ".php";
    }
}

