<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [
            'image1.jpg',
            'image2.jpg',
            'image3.jpg',
            'image4.jpg',
            'image5.jpg',
            'image6.jpg',
            'image7.jpg',
            'image8.jpg',
            'image9.jpg',
            'image10.jpg',
            'image11.jpg',
            'image12.jpg',
            'image13.jpg',
            'image14.jpg',
            'image15.jpg',
            'image16.jpg',
            'image17.jpg',
            'image18.jpg',
            'image19.jpg',
            'image20.jpg',
            'image21.jpg',
            'image22.jpg',
            'image23.jpg',
            'image24.jpg',
            'image25.jpg',
            'image26.jpg',
            'image27.jpg',
            'image28.jpg',
            'image29.jpg',
            'image30.jpg',
            'image31.jpg',
            'image32.jpg',
            'image33.jpg',
            'image34.jpg',
            'image35.jpg',
            'image36.jpg',
            'image37.jpg',
            'image38.jpg',
            'image39.jpg',
            'image40.jpg',
        ];

        $random = array_rand($images);

        return [

            'path' => "/laptop/{$images[$random]}"
        ];
    }
}
