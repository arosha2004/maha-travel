<?php
// api/tours_data.php - Central dataset for Maha Lanka Tours

function get_all_tours() {
    return [
        [
            'id' => 1,
            'slug' => 'royal-cultural-heritage',
            'title' => 'The Royal Cultural Heritage Tour',
            'subtitle' => 'Explore Sigiriya, Dambulla & Kandy Sacred Temples',
            'category' => 'Cultural Heritage',
            'category_code' => 'cultural',
            'duration' => '6 Days / 5 Nights',
            'days' => 6,
            'price' => 850,
            'rating' => 4.9,
            'reviews_count' => 128,
            'image' => 'images/sigiriya_rock.png',
            'gallery' => [
                'images/sigiriya_rock.png',
                'images/kandy_temple.png',
                'images/sri_lanka_tea_estate.png'
            ],
            'region' => 'Cultural Triangle',
            'badge' => 'Bestseller',
            'highlights' => [
                'Climb UNESCO Sigiriya Rock Fortress',
                'Visit Dambulla Golden Cave Temple',
                'Experience Temple of the Tooth Relic in Kandy',
                'Polonnaruwa Ancient Kingdom Tour',
                'Wild Elephant Safari in Minneriya'
            ],
            'itinerary' => [
                ['day' => 1, 'title' => 'Arrival & Transfer to Habarana', 'desc' => 'VIP airport welcome, transfer in private luxury vehicle, evening relaxation at hotel lake view terrace.'],
                ['day' => 2, 'title' => 'Sigiriya Fortress & Minneriya Safari', 'desc' => 'Early morning climb of Sigiriya Lion Rock. Afternoon 4x4 Jeep Safari to witness wild elephant herds.'],
                ['day' => 3, 'title' => 'Polonnaruwa Ancient City & Dambulla Caves', 'desc' => 'Explore 11th-century royal palace ruins, Gal Vihara giant Buddha statues, and ancient cave frescoes.'],
                ['day' => 4, 'title' => 'Spice Gardens & Kandy Sacred Temple', 'desc' => 'Drive to hill country Kandy via Matale spice gardens. Attend evening Pooja ceremony at Temple of Tooth.'],
                ['day' => 5, 'title' => 'Peradeniya Botanical Gardens & Cultural Show', 'desc' => 'Stroll through Royal Botanical Gardens, enjoy traditional Kandyan dance performance and fire walking.'],
                ['day' => 6, 'title' => 'Colombo City & Departure', 'desc' => 'Scenic drive to Colombo, brief city shopping, and transfer to Bandaranaike International Airport.']
            ],
            'inclusions' => ['Private luxury AC vehicle with driver-guide', '5-star / 4-star boutique hotel accommodation', 'Daily breakfast & dinner', 'All entrance tickets & permits', 'Bottled water & wifi onboard']
        ],
        [
            'id' => 2,
            'slug' => 'ella-hill-country-escape',
            'title' => 'Ella & Hill Country Highlands Escape',
            'subtitle' => 'Cloud forests, waterfalls & scenic blue train ride',
            'category' => 'Adventure & Nature',
            'category_code' => 'adventure',
            'duration' => '5 Days / 4 Nights',
            'days' => 5,
            'price' => 720,
            'rating' => 4.95,
            'reviews_count' => 94,
            'image' => 'images/ella_nine_arch.png',
            'gallery' => [
                'images/ella_nine_arch.png',
                'images/sri_lanka_tea_estate.png'
            ],
            'region' => 'Central Highlands',
            'badge' => 'Top Scenic',
            'highlights' => [
                'Famous Kandy to Ella Observation Train',
                'Nine Arch Bridge Photo Walk',
                'Hike Little Adam’s Peak',
                'Nuwara Eliya Tea Estate & Tasting',
                'Ravana Waterfall & Flying Ravana Zipline'
            ],
            'itinerary' => [
                ['day' => 1, 'title' => 'Colombo to Nuwara Eliya "Little England"', 'desc' => 'Ascend scenic mountain passes past Devon & St. Clair waterfalls. Colonial tea factory tour & high tea.'],
                ['day' => 2, 'title' => 'Iconic Blue Train to Ella', 'desc' => 'Board 1st class observation compartment train through mist-covered tea plantations to Ella.'],
                ['day' => 3, 'title' => 'Nine Arch Bridge & Little Adam’s Peak', 'desc' => 'Watch train pass over 9 Arch Demodara Bridge. Sunrise hike up Little Adam’s Peak with 360-degree canyon views.'],
                ['day' => 4, 'title' => 'Ravana Falls & Adventure Sports', 'desc' => 'Visit Ravana Caves, thrilling Flying Ravana zipline experience, evening sunset lounge at Cafe Chill.'],
                ['day' => 5, 'title' => 'Transfer to Airport / Coast', 'desc' => 'Descend through mountain valleys to Colombo airport or southern beach extension.']
            ],
            'inclusions' => ['1st Class Train tickets guaranteed', 'Boutique hill country resort stay', 'Guided mountain trekking', 'Private AC vehicle for luggage transfers', 'High Tea experience at colonial estate']
        ],
        [
            'id' => 3,
            'slug' => 'southern-paradise-whale-safari',
            'title' => 'Southern Paradise & Blue Whale Safari',
            'subtitle' => 'Golden beaches, Galle Fort & oceanic giants',
            'category' => 'Beach & Wildlife',
            'category_code' => 'beach',
            'duration' => '7 Days / 6 Nights',
            'days' => 7,
            'price' => 980,
            'rating' => 4.88,
            'reviews_count' => 156,
            'image' => 'images/mirissa_beach_whale.png',
            'gallery' => [
                'images/mirissa_beach_whale.png',
                'images/galle_dutch_fort.png'
            ],
            'region' => 'Southern Coast',
            'badge' => 'Popular',
            'highlights' => [
                'Mirissa Private Catamaran Whale Watching',
                'Galle Dutch Fort Sunset Rampart Walk',
                'Stilt Fishermen of Koggala',
                'Turtle Conservation Sanctuary Visit',
                'Bentota Lagoon River Boat Safari'
            ],
            'itinerary' => [
                ['day' => 1, 'title' => 'Arrival & Transfer to Bentota Coast', 'desc' => 'Arrive in Sri Lanka, transfer to luxury beach resort in Bentota. Evening beach dinner.'],
                ['day' => 2, 'title' => 'Madu River Safari & Turtle Hatchery', 'desc' => 'Boat ride through mangrove islands, visit cinnamon island & sea turtle sanctuary.'],
                ['day' => 3, 'title' => 'Transfer to Mirissa Coast', 'desc' => 'Drive along scenic coastal road past Weligama bay, check-in to cliffside beach hotel.'],
                ['day' => 4, 'title' => 'Blue Whale & Dolphin Watching Safari', 'desc' => 'Early morning luxury boat trip into Indian Ocean to spot Blue Whales and spinner dolphins.'],
                ['day' => 5, 'title' => 'Galle Fort Colonial Walk', 'desc' => 'Explore 17th-century UNESCO Galle Fort cobblestone streets, artisan shops, and lighthouse sunset.'],
                ['day' => 6, 'title' => 'Unawatuna Beach & Water Sports', 'desc' => 'Relax on palm-fringed beach, snorkeling, paddle boarding, or beach club sunset party.'],
                ['day' => 7, 'title' => 'Departure Transfer', 'desc' => 'Comfortable express highway transfer to airport with lasting tropical memories.']
            ],
            'inclusions' => ['Oceanfront 5-star resort accommodation', 'Whale watching VIP boat tickets', 'Galle Fort historical walking tour', 'Daily seafood & international dining options', 'Private airport transfers']
        ],
        [
            'id' => 4,
            'slug' => 'yala-wildlife-ceylon-odyssey',
            'title' => 'Yala Leopard Safari & Wild Ceylon',
            'subtitle' => 'Track Sri Lankan leopards, sloth bears & wild elephants',
            'category' => 'Wildlife & Safari',
            'category_code' => 'wildlife',
            'duration' => '4 Days / 3 Nights',
            'days' => 4,
            'price' => 690,
            'rating' => 4.92,
            'reviews_count' => 88,
            'image' => 'images/yala_leopard_safari.png',
            'gallery' => [
                'images/yala_leopard_safari.png',
                'images/hero_sri_lanka.png'
            ],
            'region' => 'Deep South Wildlife Reserve',
            'badge' => 'Adventure',
            'highlights' => [
                'Morning & Evening 4x4 Safaris in Yala Block 1',
                'Udawalawe Elephant Transit Home Visit',
                'Luxury Glamping Tent Experience',
                'Bush Dinner under the stars',
                'Expert Wildlife Naturalist Guide'
            ],
            'itinerary' => [
                ['day' => 1, 'title' => 'Colombo to Udawalawe & Yala', 'desc' => 'Morning drive south. Visit Udawalawe elephant milk feeding station. Check in to luxury tented camp.'],
                ['day' => 2, 'title' => 'Full-Day Yala Leopard Safari', 'desc' => 'Dawn safari in search of Yala leopards, wild boars, peacocks, and mugger crocodiles. Afternoon bush rest & sunset safari.'],
                ['day' => 3, 'title' => 'Bundala Bird Sanctuary & Campfire', 'desc' => 'Visit UNESCO Bundala wetland reserve home to thousands of flamingos. Traditional BBQ dinner under stars.'],
                ['day' => 4, 'title' => 'Return Transfer', 'desc' => 'Final morning nature walk, brunch, and drive back to Colombo airport or coastal hotel.']
            ],
            'inclusions' => ['Custom 4x4 open safari jeeps', 'Private wildlife naturalist guide', 'All national park entrance fees', 'Luxury glamping / safari lodge stay', 'All meals & evening campfire BBQ']
        ],
        [
            'id' => 5,
            'slug' => 'luxury-honeymoon-island-indulgence',
            'title' => 'Luxury Honeymoon & Island Indulgence',
            'subtitle' => 'Private villas, champagne sunsets & bespoke romance',
            'category' => 'Luxury & Romance',
            'category_code' => 'luxury',
            'duration' => '8 Days / 7 Nights',
            'days' => 8,
            'price' => 1650,
            'rating' => 5.0,
            'reviews_count' => 62,
            'image' => 'images/luxury_honeymoon_villa.png',
            'gallery' => [
                'images/luxury_honeymoon_villa.png',
                'images/mirissa_beach_whale.png'
            ],
            'region' => 'Island-wide VIP',
            'badge' => 'Luxury Ultra',
            'highlights' => [
                'Private Pool Villa Accommodations',
                'Helicopter Scenic Flight option',
                'Couples Spa & Wellness Treatments',
                'Private Candlelight Dinner on Beach',
                'Dedicated 24/7 Butler & Luxury Vehicle'
            ],
            'itinerary' => [
                ['day' => 1, 'title' => 'VIP Airport Arrival & Tea Bungalow', 'desc' => 'Chauffeur luxury SUV transfer to tea hills. Welcome champagne and private bungalow fireplace.'],
                ['day' => 2, 'title' => 'Tea Trails Romantics & Spa', 'desc' => 'Gentle walk through emerald tea fields, private tea tasting session, and herbal couple spa.'],
                ['day' => 3, 'title' => 'Private Helicopter Scenic Flight', 'desc' => 'Fly over Adam’s Peak and waterfalls directly to southern coast private pool villa.'],
                ['day' => 4, 'title' => 'Private Beach Day & Butler Service', 'desc' => 'Total privacy on secluded beach, personal chef prepared seafood feast.'],
                ['day' => 5, 'title' => 'Sunset Sunset Catamaran Cruise', 'desc' => 'Chartered catamaran trip into ocean for sunset cocktails and swimming.'],
                ['day' => 6, 'title' => 'Historical Fort Romance', 'desc' => 'Guided evening walk in Galle Fort followed by fine dining at heritage mansion.'],
                ['day' => 7, 'title' => 'Total Wellness & Relaxation', 'desc' => 'Ayurvedic wellness consultation, yoga session, and private infinity pool relaxation.'],
                ['day' => 8, 'title' => 'VIP Farewell Transfer', 'desc' => 'Chauffeur luxury transfer to airport fast-track lounge.']
            ],
            'inclusions' => ['5-Star Luxury Private Pool Villa stays', 'Dedicated private butler & luxury Mercedes/SUV', 'Welcome champagne & romantic decor', 'All meals & spa treatments', 'Fast-track airport VIP service']
        ],
        [
            'id' => 6,
            'slug' => 'arugam-bay-surf-retreat',
            'title' => 'Arugam Bay Surf & East Coast Retreat',
            'subtitle' => 'World-class surfing, golden sands & coastal vibes',
            'category' => 'Beach & Adventure',
            'category_code' => 'beach',
            'duration' => '6 Days / 5 Nights',
            'days' => 6,
            'price' => 780,
            'rating' => 4.85,
            'reviews_count' => 112,
            'image' => 'images/hero_sri_lanka.png',
            'gallery' => [
                'images/hero_sri_lanka.png',
                'images/mirissa_beach_whale.png'
            ],
            'region' => 'Eastern Coast',
            'badge' => 'Trending',
            'highlights' => [
                'Surfing at Arugam Bay Main Point',
                'Kumana National Park Wildlife Safari',
                'Muhudu Maha Viharaya Ancient Temple',
                'Lagoon Safari at Pottuvil',
                'Beachfront Yoga & Wellness'
            ],
            'itinerary' => [
                ['day' => 1, 'title' => 'Arrival & East Coast Journey', 'desc' => 'Scenic drive to the East Coast. Check-in to your beachfront eco-resort in Arugam Bay.'],
                ['day' => 2, 'title' => 'Surf Lessons & Beach Relaxation', 'desc' => 'Morning surf session with expert instructors. Afternoon relaxing by the ocean or pool.'],
                ['day' => 3, 'title' => 'Kumana National Park Safari', 'desc' => 'Jeep safari in Kumana to spot leopards, elephants, and rare bird species.'],
                ['day' => 4, 'title' => 'Pottuvil Lagoon Safari & Ancient Temples', 'desc' => 'Explore the mangroves of Pottuvil Lagoon. Visit the historical Muhudu Maha Viharaya temple ruins.'],
                ['day' => 5, 'title' => 'Free Day for Surfing or Yoga', 'desc' => 'Spend the day riding the waves or enjoying a guided yoga session on the beach.'],
                ['day' => 6, 'title' => 'Departure', 'desc' => 'Transfer back to Colombo or the airport, ending your east coast adventure.']
            ],
            'inclusions' => ['Beachfront eco-resort accommodation', 'Professional surf lessons and board rental', 'Kumana safari jeep & tickets', 'Daily breakfast & dinner', 'Private AC transfers']
        ]
    ];
}

function get_tour_by_id($id) {
    $tours = get_all_tours();
    foreach ($tours as $t) {
        if ($t['id'] == $id) return $t;
    }
    return null;
}

function get_destinations_data() {
    return [
        [
            'name' => 'Sigiriya Rock Fortress',
            'region' => 'Cultural Triangle',
            'category' => 'History & Heritage',
            'image' => 'images/sigiriya_rock.png',
            'desc' => 'An ancient 5th-century palace fortress built atop a 200m sheer rock column surrounded by gardens.',
            'best_time' => 'Dec - April'
        ],
        [
            'name' => 'Ella Highlands',
            'region' => 'Central Hill Country',
            'category' => 'Nature & Trekking',
            'image' => 'images/ella_nine_arch.png',
            'desc' => 'Mist-enshrouded mountain peaks, waterfalls, famous nine-arch bridge, and rolling tea gardens.',
            'best_time' => 'Jan - May'
        ],
        [
            'name' => 'Mirissa Coastal Haven',
            'region' => 'Southern Province',
            'category' => 'Beaches & Ocean',
            'image' => 'images/mirissa_beach_whale.png',
            'desc' => 'Famous for coconut hills, turquoise surfing bays, and world-class blue whale watching expeditions.',
            'best_time' => 'Nov - April'
        ],
        [
            'name' => 'Kandy Sacred City',
            'region' => 'Central Province',
            'category' => 'Culture & Religion',
            'image' => 'images/kandy_temple.png',
            'desc' => 'Lakeside royal city housing the Sacred Tooth Relic of Buddha, surrounded by tropical forest hills.',
            'best_time' => 'Year Round'
        ],
        [
            'name' => 'Yala National Park',
            'region' => 'Southern Wild Reserve',
            'category' => 'Wildlife & Safari',
            'image' => 'images/yala_leopard_safari.png',
            'desc' => 'Home to the world’s highest density of leopards, wild elephants, sloth bears, and 200+ bird species.',
            'best_time' => 'Feb - July'
        ],
        [
            'name' => 'Galle Dutch Fort',
            'region' => 'Southern Coast',
            'category' => 'Colonial Heritage',
            'image' => 'images/galle_dutch_fort.png',
            'desc' => 'Living 17th-century UNESCO Dutch fort with ramparts, lighthouse, luxury boutiques, and cafes.',
            'best_time' => 'Nov - April'
        ]
    ];
}

