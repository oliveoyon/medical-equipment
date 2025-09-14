<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ==== BRANDS ====
        $brands = [
            'Medtronic', 'GE Healthcare', 'Siemens Healthineers', 'Philips Healthcare',
            'Mindray', 'Fresenius Medical Care', 'Abbott', 'Boston Scientific',
            'B. Braun', 'Canon Medical', 'Dräger'
        ];

        foreach ($brands as $index => $brand) {
            DB::table('brands')->insert([
                'name' => $brand,
                'logo' => 'brands/brand' . ($index + 1) . '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ==== COLORS ====
        $colors = [
            ['White', '#FFFFFF'],
            ['Black', '#000000'],
            ['Silver', '#C0C0C0'],
            ['Blue', '#0000FF'],
            ['Green', '#008000'],
        ];

        foreach ($colors as $c) {
            DB::table('colors')->insert([
                'name' => $c[0],
                'hex' => $c[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ==== SIZES ====
        $sizes = ['Small', 'Medium', 'Large'];
        foreach ($sizes as $s) {
            DB::table('sizes')->insert([
                'name' => $s,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ==== CATEGORIES & SUBCATEGORIES ====
        $categories = [
            [
                'name' => 'Diagnostic Imaging',
                'subcategories' => ['X-Ray Machines', 'MRI Scanners', 'Ultrasound Devices', 'CT Scanners'],
            ],
            [
                'name' => 'Patient Monitoring',
                'subcategories' => ['ECG Monitors', 'Blood Pressure Monitors', 'Pulse Oximeters', 'ICU Monitors'],
            ],
            [
                'name' => 'Surgical Instruments',
                'subcategories' => ['General Surgery', 'Orthopedic Instruments', 'Neurosurgical Tools', 'Endoscopy Instruments'],
            ],
            [
                'name' => 'Laboratory Equipment',
                'subcategories' => ['Centrifuges', 'Microscopes', 'Analyzers', 'Incubators'],
            ],
            [
                'name' => 'Respiratory Care',
                'subcategories' => ['Ventilators', 'Nebulizers', 'Oxygen Concentrators'],
            ],
            [
                'name' => 'Dialysis Equipment',
                'subcategories' => ['Hemodialysis Machines', 'Peritoneal Dialysis Systems', 'Dialyzers'],
            ],
            [
                'name' => 'Infusion Therapy',
                'subcategories' => ['Infusion Pumps', 'Syringe Pumps', 'IV Sets'],
            ],
            [
                'name' => 'Rehabilitation Devices',
                'subcategories' => ['Physiotherapy Equipment', 'Walking Aids', 'Wheelchairs'],
            ],
            [
                'name' => 'Dental Equipment',
                'subcategories' => ['Dental Chairs', 'X-Ray Systems', 'Sterilizers'],
            ],
            [
                'name' => 'Hospital Furniture',
                'subcategories' => ['Hospital Beds', 'Stretchers', 'Examination Tables'],
            ],
        ];

        $productCounter = 1;

        foreach ($categories as $cIndex => $cat) {
            $catId = DB::table('categories')->insertGetId([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['name'] . ' related equipment and devices.',
                'icon' => 'categories/category_img_' . ($cIndex + 1) . '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($cat['subcategories'] as $sub) {
                $subId = DB::table('subcategories')->insertGetId([
                    'category_id' => $catId,
                    'name' => $sub,
                    'slug' => Str::slug($sub),
                    'description' => $sub . ' for hospitals and clinics.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // ==== PRODUCTS ====
                for ($p = 1; $p <= 2; $p++) {
                    if ($productCounter > 27) $productCounter = 1; // loop images if exceed

                    $brandId = rand(1, count($brands));
                    $productName = $sub . " Model " . $p;

                    $prodId = DB::table('products')->insertGetId([
                        'category_id' => $catId,
                        'subcategory_id' => $subId,
                        'brand_id' => $brandId,
                        'name' => $productName,
                        'slug' => Str::slug($productName) . '-' . uniqid(),
                        'model' => strtoupper(Str::random(5)),
                        'description' => 'High-quality ' . strtolower($sub) . ' used in modern healthcare.',
                        'sizes' => json_encode($sizes),
                        'colors' => json_encode(array_column($colors, 0)),
                        'specifications' => '<ul><li>Durable design</li><li>Warranty included</li><li>Certified by ISO standards</li></ul>',
                        'status' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Add product images
                    DB::table('product_images')->insert([
                        'product_id' => $prodId,
                        'image' => 'products/images/product_' . $productCounter . '.png',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $productCounter++;
                }
            }
        }
    }
}
