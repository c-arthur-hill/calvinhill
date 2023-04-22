<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\AccountUser;
use App\Models\CustomerOrder;
use App\Models\ManufacturerProduct;
use App\Models\ManufacturerProductVariation;
use App\Models\Media;
use App\Models\MediaPosition;
use App\Models\MediaWorkOrder;
use App\Models\RequestedShippingMethod;
use App\Models\Size;
use App\Models\User;
use App\Models\WorkOrder;
use App\Models\WorkOrderItem;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    // These have all been downloaded to s3 already so, just keeping this for records
    // The images were all at self::ORIGINAL_URL . $name
    const ORIGINAL_URL = 'https://images.metmuseum.org/CRDImages/ep/original/';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mediaSequence = [];
        foreach(Storage::drive('s3')->files('img/media') as $s3Path) {
            $fileName = str_replace('img/media/', '', $s3Path);
            $mediaSequence[] = [
                'original_url' => Storage::disk('s3')->url($s3Path),
            ];
        }

        $medias = Media::factory()
            ->count(count($mediaSequence))
            ->sequence(...$mediaSequence)
            ->create();

        $mediaPositions = MediaPosition::factory()
            ->count(3)
            ->sequence(
                ['name' => 'front'],
                ['name' => 'back'],
                ['name' => 'sleeve']
            )
            ->create();


        $manufacturerProduct = ManufacturerProduct::factory()
            ->create(['name' => 'shirt']);
        $sizes = Size::factory()
            ->count(3)
            ->sequence(
                ['name' => 'small'],
                ['name' => 'medium'],
                ['name' => 'large']
            )
            ->create();

        $requestedShippingMethods = RequestedShippingMethod::factory()
            ->create(['name' => 'USPS']);

        $account = Account::factory()
            ->hasAttached(
                User::factory()
                    ->create(),
                ['role' => AccountUser::MANAGER],
            )
            ->create();

        $mpv = ManufacturerProductVariation::factory()
            ->create([
                'manufacturer_product_id' => $manufacturerProduct,
                'size_id' => $sizes[1]->id
            ]);


        CustomerOrder::factory()
            ->has(
                WorkOrder::factory()
                    ->count(2)
                    ->has(
                        WorkOrderItem::factory()
                            ->count(1)

                    )
                    ->for($mpv)
                    ->for($requestedShippingMethods)
                    ->for($account)
                    ->hasAttached(
                        $medias->slice(0, 1),
                        [
                            'media_position_id' => $mediaPositions[0]->id
                        ]

                    )
            )
            ->create();
    }
}
