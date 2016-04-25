<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetUpDefaultDbModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
        |--------------------------------
        | CREATE TABLES
        |--------------------------------
        */

        DB::statement('
            CREATE TABLE categories (
            catID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            name VARCHAR(255),
            canEdit INT DEFAULT 1,
            createdAt DATETIME DEFAULT CURRENT_TIMESTAMP(),
            updatedAt TIMESTAMP
            );
        ');

        DB::statement('
            CREATE TABLE items (
            itemID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            title VARCHAR(255),
            info VARCHAR(255),
            fileName VARCHAR(255),
            createdAt DATETIME DEFAULT CURRENT_TIMESTAMP(),
            updatedAt TIMESTAMP
            );
        ');

        DB::statement('
            CREATE TABLE admin_data (
            adminDataID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            name VARCHAR(255),
            value varchar(225),
            createdAt DATETIME DEFAULT CURRENT_TIMESTAMP(),
            updatedAt TIMESTAMP
            );
        ');

        DB::statement('
            CREATE TABLE link_items_categories (
            linkID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            itemID INT,
            catID INT,
            createdAt DATETIME DEFAULT CURRENT_TIMESTAMP(),
            updatedAt TIMESTAMP
            );
        ');

        /*
        |--------------------------------
        | POPULATE TABLES
        |--------------------------------
        */

        DB::statement('
            INSERT INTO admin_data (name, value) VALUES
            ("artist-name", "Artist Name")
            ;
        ');

        DB::statement('
            INSERT INTO categories (name, canEdit) VALUES
            ("All art", 0),
            ("Digital art", 1),
            ("Paintings", 1),
            ("Sketches", 1)
            ;
        ');

        DB::statement("
            INSERT INTO items (title, info, fileName) VALUES
            ('Cat with glasses', 'He thinks he''s sooooooo cool', 'gM6Xpf6XfVXjc3gVMYhQFJxWRm1ryySWCrRCQiH3.jpg'),
            ('Cat with green eyes', 'Looks like he knows something...', 'cpSDjz9LZrRmaTFdgTeN2wWGCRuZdwZdSqZIFSVU.jpg'),
            ('Fabulous lion', '', 'UlcM5OhRyj7TY9mQkIXBDpHhlslVu32lKP5GcW8Y.jpg'),
            ('Cat with blue eyes', 'He got dem rececives', 'zl6nMQ1Fbknkfz4H7dbjtSm6AYv1VV2ZCQE7EKo0.jpg'),
            ('Haunter', 'As a child this pokemon freaked me out', 'NnBAwx7BdOgUe4hZjC7utGuZzfQ9KXrqCJ8wKYfZ.jpg'),
            ('Heaven meets hell', '', 'Gq9zgTSQ7cR0bk0tM5bipHdvfbjr2hYgLeMDsEqc.jpg'),
            ('Clear as glass', '', 'zB3VwpLDWByEosQfImFB9hntRH4HhRKcYKz8llE4.jpg'),
            ('Siberian Tiger', 'My sister always thought these were really cool', 'SQjZxq5nmnN6rFrliKODiFO5Wd4Geltf5RGls6Wc.jpg'),
            ('Iguana', 'I''m trying to decide if this picture looks more like a gummy bear, or a gummy worm...', 'HHpCIbHop3zl3C2t0WZgvYJOmmvpBdqAwdVH1dGH.jpg'),
            ('White water falling', '', 'oQkorPK9XK3o4T2k5osUPVV4vBnjcztqj95mO3r8.jpg'),
            ('Cityscape', 'I wonder what city this is', 'rvvX5j7VPo6BlUG99lkODEM2BKIbfAGiTB6ZF4n2.jpg'),
            ('Coast city scape', 'East or west?', 'y2AUYA8gagMAMYc5aCYIcyxrJkDvrXsuocxZOedr.jpg'),
            ('Alien landscape', '', 'VhY57pfmwfSa8CHPx46yxucNzshOGrHdFbQA5zFj.jpg'),
            ('Blue-green water', 'This reminds me of the water in Havasupai', 'cbHgsySbr98tlsQFhldXlPh1R27qPVgeMxDOgiPV.jpg'),
            ('Where the water is', '', 'gd7u1keBulP8DkSqBO5ykigFeBa0v6rK0QqGgYsi.jpg'),
            ('Calm Tiger', '', 'oVI6rFR1kL4BOpbieWyIQDzB01PKv3I4Ud2horZc.jpg'),
            ('The launch', '\"T minus 0 seconds...\"', 'W9np5V8ntiSCcZoLWbePRtV9sfoGmYMekAHqRs3w.jpg'),
            ('Green snake', '', 'V0knasTkCiSvjyHe5vEUxyUi8WpTBNNwc1qXkCnu.jpg'),
            ('Red Fall', 'The color is so vibrant. It always shocks me.', 'RwjOXw6jSXqFIEXdAUagP2N2v2wgxaXpE7TyCtzw.jpg'),
            ('Green Field', 'This is dream material', 'SaR25jPwE8PmJVbd1tbtN9KvPDgHJ5CnLiTYxvmY.jpg'),
            ('Bright lights in the big city', 'Name that movie!', 'rs384ODs2JzPpo5hrT6ZQppcbN3Bfu9kPdM3kgKN.jpg'),
            ('Mountain lake', '', 'Gj51EbXFNfwjJgaTErOoRo5P1NmnvXKVm8PejT18.jpg'),
            ('Cliff lake', '', 'g0pAfGJJo1kui7wUTQnARZZuAOp5mvJnrDqGauHB.jpg'),
            ('Island in the air', 'I wonder what happened to make it like that', 'OG01ow5ob4I2vyXxFyF6dO6GzVdvZEGrSskY4NQQ.jpg'),
            ('Solar flare', '', 'eSmRlaqrtS6bM6XXetqejJ03n5QhHaek4NRLHTXf.jpg'),
            ('Lonely tree', 'This looks like something from kung fu panda mixed with skyrim', 'KMsqfYPWEUifhiHb6Hg9DB7JnucJYQTMHSxFQQ7d.jpg'),
            ('Spiral Galaxy', '', 'dwURMmqrOHyB60TXCG0nW0xmDD3gaJDAN33eF3Oz.jpg'),
            ('Arthas', '\"Frostmorne hungers...\"', 'oSXFgpXNM2VzjDBRJ9wIDhjyPxkmLUn153qzhBbq.jpg'),
            ('Quiet meadow', 'There needs to be a bunny. A bunny would be perfect. Don''t you think?', '3sHzVWo5BXsWqS6vrOkCJ5ZqMyRfYHbNkItiYoUi.jpg'),
            ('City from the ocean', '', 'sZtIQeDXpIsaPAD6UQP5aI0pvagKOmX7hfAo5BH7.jpg')
            ;
        ");

        DB::statement('
            INSERT INTO link_items_categories (itemID, catID) VALUES
            (1, 1),(2, 1),(2, 2),(3, 1),(3, 3),(4, 1),(4, 4),(5, 1),(5, 2),(5, 3),(6, 1),(6, 3),(6, 4),(7, 1),
            (7, 2),(7, 4),(8, 1),(8, 2),(8, 3),(8, 4),(9, 1),(9, 2),(10, 1),(10, 3),(11, 1),(11, 4),(12, 1),
            (13, 1),(13, 2),(13, 3),(14, 1),(14, 3),(14, 4),(15, 1),(15, 2),(15, 4),(16, 1),(16, 2),(16, 3),
            (16, 4),(17, 1),(18, 1),(18, 2),(19, 1),(19, 3),(20, 1),(20, 4),(21, 1),(21, 2),(21, 3),(22, 1),
            (22, 3),(22, 4),(23, 1),(23, 2),(23, 4),(24, 1),(24, 2),(24, 3),(24, 4),(25, 1),(26, 1),(26, 2),
            (28, 1),(28, 3),(29, 1),(29, 4),(30, 1),(30, 2),(30, 3),(31, 1),(31, 3),(31, 4)
            ;
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE categories;');
        DB::statement('DROP TABLE admin_data;');
        DB::statement('DROP TABLE items;');
        DB::statement('DROP TABLE link_items_categories;');
    }
}
