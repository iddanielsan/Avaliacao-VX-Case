<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\ProductRepository;

class InsertProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name} {reference} {price} {delivery_days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert a product to database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->productRepository->store([
            "product" => $this->argument('name'),
            "reference" => $this->argument('reference'),
            "price" => $this->argument('price'),
            "delivery_days" => $this->argument('delivery_days')
        ]);
    }
}
