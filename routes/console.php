<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Models\User;
use App\Models\Question;




Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');






Artisan::command('users', function () {

    foreach(User::All() as $user) {
        echo "--- " . $user -> full_name . " -- " . $user -> email . "\n";
    }

})->purpose('Show All Users');







Artisan::command('questions', function () {

    foreach(Question::All() as $question) {
        echo "--- " . $question -> title . "\n";
    }

})->purpose('Show All Questions');













Artisan::command('add_fake_questions', function () {

    $cityData = [
        [
            'title' => 'Exploring the Modern Wonders of Casablanca',
            'content' => 'Casablanca is known for its modern architecture and vibrant culture. Have you visited the famous Hassan II Mosque or the Royal Palace?',
            'location' => 'Casablanca',
        ],
        [
            'title' => 'Discovering the Heart of Marrakech',
            'content' => 'Marrakech is a city that blends ancient traditions with modern influences. What’s your favorite spot in the Medina or the vibrant Jemaa el-Fnaa square?',
            'location' => 'Marrakech',
        ],
        [
            'title' => 'The Timeless Beauty of Fes',
            'content' => 'Fes is one of the oldest cities in Morocco, renowned for its historical significance and the world-famous Fes El Bali. Have you wandered through the ancient streets of the old city?',
            'location' => 'Fes',
        ],
        [
            'title' => 'Relaxing on the Beaches of Agadir',
            'content' => 'Agadir is Morocco\'s premier beach destination, perfect for a relaxing getaway. Have you enjoyed the sunsets over the Atlantic Ocean from the Corniche?',
            'location' => 'Agadir',
        ],
        [
            'title' => 'The Charm of Tangier’s Coastal Life',
            'content' => 'Tangier’s strategic position between Europe and Africa gives it a unique cultural fusion. Do you prefer the peaceful beaches or the lively medina?',
            'location' => 'Tangier',
        ],
        [
            'title' => 'A Glimpse into Rabat’s Royal Heritage',
            'content' => 'Rabat, the capital of Morocco, is home to historical landmarks like the Royal Palace and the Hassan Tower. Which historical site in Rabat stands out to you the most?',
            'location' => 'Rabat',
        ],
        [
            'title' => 'Exploring the Imperial City of Meknes',
            'content' => 'Meknes, one of Morocco’s imperial cities, is rich in history and boasts impressive architecture. Have you explored the Bab Mansour and the royal stables?',
            'location' => 'Meknes',
        ],
        [
            'title' => 'The Blue Pearl of Morocco: Chefchaouen',
            'content' => 'Chefchaouen is famous for its blue-painted buildings and tranquil mountain setting. Have you ever wondered why the town is painted entirely in shades of blue?',
            'location' => 'Chefchaouen',
        ],
        [
            'title' => 'The Gateway to the Sahara: Ouarzazate',
            'content' => 'Known as the door to the Sahara Desert, Ouarzazate is famous for its kasbahs and the Atlas Film Studios. Would you prefer a film tour or a desert excursion?',
            'location' => 'Ouarzazate',
        ],
        [
            'title' => 'Windswept Beauty of Essaouira',
            'content' => 'Essaouira is a beautiful coastal city known for its historic medina and windsurfing spots. Have you visited the Skala de la Ville or relaxed on the beach?',
            'location' => 'Essaouira',
        ],
        [
            'title' => 'Tétouan: A Blend of Andalusian and Moroccan Culture',
            'content' => 'Tétouan\'s history is deeply influenced by Andalusian Spain, creating a unique cultural heritage. What’s your favorite feature of the city’s Medina?',
            'location' => 'Tétouan',
        ],
        [
            'title' => 'Nador: A Lesser-Known Gem in Northern Morocco',
            'content' => 'Nador is a hidden gem in northern Morocco, offering beautiful beaches and rich culture. Have you explored the nearby Boudinar or the pristine beaches of Mar Chica?',
            'location' => 'Nador',
        ],
        [
            'title' => 'The Portuguese Influence in El Jadida',
            'content' => 'El Jadida is a coastal town with Portuguese architecture and an inviting beach atmosphere. Have you visited the historic Portuguese cistern or strolled along the old town walls?',
            'location' => 'El Jadida',
        ],
        [
            'title' => 'Beni Mellal: A Hidden Oasis in Central Morocco',
            'content' => 'Beni Mellal, nestled at the base of the Middle Atlas Mountains, is a serene city with beautiful parks and gardens. What do you think of the Kasbah of Tazoult, just outside the city?',
            'location' => 'Beni Mellal',
        ],
        [
            'title' => 'The Silver City of Tiznit',
            'content' => 'Tiznit is famous for its silver jewelry and old town charm. Have you wandered through the bustling souks and discovered the region’s craftsmanship?',
            'location' => 'Tiznit',
        ],
    ];

    $i = 0;
    

    foreach($cityData as $city ) {
        $question = new Question();

        $question -> title = $city['title'];
        $question -> content = $city['content'];
        $question -> location = $city['location'];
        $question -> user_id = $i++ % 4 + 1;

        $question -> save();
    }

})->purpose('Insert New Questions');