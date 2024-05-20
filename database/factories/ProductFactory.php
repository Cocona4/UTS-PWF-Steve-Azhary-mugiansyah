<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Laptop', 'Mouse', 'Ram'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek Laptop
        $laptopBrands = [
            'ASUS ROG',
            'ASUS TUF',
        ];

        // Daftar merek mouse
        $mouseBrands = [
            'Logitech',
            'Razer',
            'Corsair',
            'SteelSeries',
            'HP',
            'Dell',
            'Asus',
            'HyperX'
        ];

        // Daftar merek Ram
        $ramBrands = [
            'Samsung',
            'Western Digital',
            'Kingston',
            'Crucial',
            'ADATA',
            'SanDisk',
            'Corsair',
            'Toshiba',
            'Intel'
        ];

        $name = $category == 'iPad'
            ? $this->faker->randomElement($ipadBrands)
            : ($category == 'Mouse'
                ? $this->faker->randomElement($mouseBrands)
                : $this->faker->randomElement($ssdBrands));

        $description = $category == 'iPad'
            ? $this->faker->randomElement([
                'ASUS menawarkan performa gaming yang lebih menyenangkan.',
                'Desain kokoh futuristik dan sangat cocok untuk digunakan multitasking.',
            ])
            : ($category == 'Mouse'
                ? $this->faker->randomElement([
                    'Mouse dengan respons cepat dan presisi tinggi.',
                    'Desain ergonomis yang nyaman untuk penggunaan jangka panjang.',
                    'Dilengkapi dengan lampu RGB yang bisa disesuaikan.'
                ])
                : $this->faker->randomElement([
                    'RAM menawarkan penggunaan dengan kecepatan baca/tulis yang sangat memumpuni.',
                    'Cepat dan andal untuk semua kebutuhan data Anda.',
                ]));

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(100000, 10000000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'iPad' ? 1 : ($category == 'Mouse' ? 2 : 3),
            'expired_at' => now()->addDays(365),
            'modified_by' => $this->faker->randomElement(['user@gmail.com', 'steve@gmail.com'])
        ];
    }
}
