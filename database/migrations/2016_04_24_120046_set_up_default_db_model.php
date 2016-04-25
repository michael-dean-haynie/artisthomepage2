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
            INSERT INTO categories (name, canEdit) VALUES
            ("All art", 0),
            ("Digital art", 1),
            ("Paintings", 1),
            ("Sketches", 1)
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
