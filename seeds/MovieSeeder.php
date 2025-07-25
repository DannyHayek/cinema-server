<?php
require "../connection/connection.php";

try {
    $queries = [
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Iron Man 3','When Tony Stark`s world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.', 130, 'PG-13', 'https://www.youtube.com/watch?v=f_h95mEd4TI', '../assets/iron_man_3.webp');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Terminator 2','A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her ten year old son John from an even more advanced and powerful cyborg.', 137, 'R', 'https://www.youtube.com/watch?v=lwSysg9o7wE', '../assets/terminator2.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Back to the Future','Marty McFly, a 17-year-old high school student, is accidentally sent 30 years into the past in a time-traveling DeLorean invented by his close friend, the maverick scientist Doc Brown.', 126, 'PG', 'https://www.youtube.com/watch?v=qvsgGtivCgs', '../assets/back_to_the_future.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Lord of the Rings: The Fellowship of the Ring','A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron.', 178, 'PG-13', 'https://www.youtube.com/watch?v=_nZdmwHrcnw', '../assets/lord_of_the_rings.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Me Before You','A girl in a small town forms an unlikely bond with a recently-paralyzed man she`s taking care of.', 120, 'PG-13', 'https://www.youtube.com/watch?v=Eh993__rOxA', '../assets/me_before_you.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Now You See Me','An FBI agent and an Interpol detective track a team of illusionists who pull off bank heists during their performances, and reward their audiences with the money.', 115, 'PG-13', 'https://youtu.be/C2NWGAqZhF4?si=0KzzXYroyj8KiISi', '../assets/now_you_see_me.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('American Psycho','A wealthy New York City investment banking executive, Patrick Bateman, hides his alternate psychopathic ego from his co-workers and friends as he delves deeper into his violent, hedonistic fantasies.', 102, 'R', 'https://youtu.be/81mibtQWWBg?si=DU-dzuiMIWd2ics9', '../assets/american_psycho.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Braveheart','Scottish warrior William Wallace leads his countrymen in a rebellion to free his homeland from the tyranny of King Edward I of England.', 178, 'R', 'https://youtu.be/1NJO0jxBtMo?si=0x6gZZ2II4QJjygO', '../assets/braveheart.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('How To Train Your Dragon (2025)','As an ancient threat endangers both Vikings and dragons alike on the isle of Berk, the friendship between Hiccup, an inventive Viking, and Toothless, a Night Fury dragon, becomes the key to both species forging a new future together.', 125, 'PG', 'https://youtu.be/22w7z_lT6YM?si=QvXYQsepcxWvZtjX', '../assets/how_to_train_your_dragon.jpg');", 
        "INSERT INTO movies(name, synopsis, length, age_rating, trailer_link, poster_url) VALUES ('Oppenheimer','A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bombs that brought an end to World War II.', 180, 'R', 'https://youtu.be/uYPbbksJxIg?si=o-rPWBYNPiMdTpIK', '../assets/oppenheimer.jpg');", 
    ];


    foreach($queries as $q) {
        $execute = $mysqli->prepare($q);
        $execute->execute();
    }

    echo "Movies table successfully populated!";

} catch(Throwable $e) {
    echo $e;
}

