<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'item_name' => "Lettuce",
            'item_desc' => "Lettuce is a leafy green vegetable that is widely used in salads, sandwiches, and as a wrap for various fillings. It has a mild flavor and is a good source of vitamins A, C, and K, as well as fiber and antioxidants.",
            'price' => 1000000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Spinach",
            'item_desc' => "Spinach is a leafy green vegetable with tender and flavorful leaves. It is a rich source of vitamins, minerals, and antioxidants, and is often used in salads, soups, and cooked dishes.",
            'price' => 1250000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Silverbeet",
            'item_desc' => "Silverbeet is a leafy green vegetable that belongs to the chard family. It's known for its high nutritional value, being a rich source of vitamins A, C, and K, as well as iron and calcium. Its leaves are large and have a mild, slightly bitter flavor that's popular in Mediterranean and Middle Eastern cuisines. It's often used in soups, stews, salads, and cooked dishes.",
            'price' => 1500000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Broccoli",
            'item_desc' => "Broccoli is a cruciferous vegetable, often with a green head and stalk, known for its high nutrient content and versatility in cooking. It's a rich source of vitamins C and K, as well as fiber and antioxidants.",
            'price' => 1000000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Cauliflower",
            'item_desc' => "Cauliflower is a cruciferous vegetable with a compact, white head and green leaves. It has a mild, nutty flavor and is often used in a variety of dishes for its versatility and health benefits. Rich in fiber, vitamins, and antioxidants, it's a nutritious addition to any diet.",
            'price' => 1250000,
        ]);
        // ^ 5

        DB::table('items')->insert([
            'item_name' => "Cabbage",
            'item_desc' => "Cabbage is a cool-season leafy vegetable in the same family as broccoli, cauliflower, and kale. It has a crunchy texture and a mild, slightly sweet flavor. It is a good source of vitamins C and K, as well as fiber.",
            'price' => 1500000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Pumpkin",
            'item_desc' => "Pumpkin is a versatile winter squash that grows on a vine and has a sweet, nutty flavor. It can be roasted, pureed, or used in soups and pies. High in fiber, vitamins, and minerals, pumpkin is a nutritious addition to a healthy diet.",
            'price' => 1000000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Cucumber",
            'item_desc' => "Cucumber is a popular vegetable with a mild flavor and high water content. It's often eaten raw in salads or used as a garnish for cocktails. Cucumber has a green, cylindrical shape and a cool, crisp texture. It's also a great source of hydration and vitamins.",
            'price' => 1250000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Zucchini",
            'item_desc' => "Zucchini is a summer squash with a delicate, slightly sweet flavor and a tender, versatile texture. It is often used in savory dishes, such as stir-fries, casseroles, and pasta dishes, as well as in baked goods, such as breads and muffins.",
            'price' => 1500000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Potato",
            'item_desc' => "Potato is a widely cultivated starchy root vegetable that is a staple food in many countries. It is versatile and can be boiled, mashed, roasted, or fried. Rich in vitamins and minerals, potatoes are a popular ingredient in dishes such as soups, stews, and gratins.",
            'price' => 1000000,
        ]);
        // ^10

        DB::table('items')->insert([
            'item_name' => "Sweet Potato",
            'item_desc' => "Sweet potato is a nutritious root vegetable with a sweet, slightly nutty flavor. It is a staple food in many parts of the world and is enjoyed roasted, mashed, or boiled. Sweet potatoes are rich in vitamins, minerals, and fiber and are considered a healthy alternative to traditional potatoes.",
            'price' => 1250000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Yam",
            'item_desc' => "Yam is a starchy root vegetable that is a staple food in many African and Caribbean countries. It has a slightly sweet, nutty flavor and a firm, dense texture. Yams are often boiled or roasted and can be used in a variety of dishes, such as stews, curries, and soups.",
            'price' => 1500000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Celery",
            'item_desc' => "Celery is a crunchy, low-calorie vegetable that is often used in soups, stews, and salads. It has a slightly bitter taste and is known for its high fiber and water content, making it a popular ingredient in detox and weight loss diets. Celery is also a good source of vitamins and minerals, including potassium and folate.",
            'price' => 1000000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Asparagus",
            'item_desc' => "Asparagus is a tender, nutritious vegetable with a slightly bitter and earthy flavor. It is a good source of fiber, vitamins, and minerals, including vitamins A and C, and is often grilled, roasted, or steamed and served as a side dish or as an ingredient in salads, soups, and frittatas.",
            'price' => 1250000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Onion",
            'item_desc' => "Onion is a staple ingredient in many cuisines, offering a slightly sweet and pungent flavor. It is a versatile vegetable, used raw in salads or cooked in a variety of dishes, such as soups, stews, sauces, and casseroles. Onions are low in calories and a good source of fiber, vitamins, and minerals.",
            'price' => 1500000,
        ]);
        // ^15

        DB::table('items')->insert([
            'item_name' => "Garlic",
            'item_desc' => "Garlic is a widely used ingredient in many cuisines, known for its strong, pungent flavor and health benefits. It is often used in dishes for flavor and aroma, as well as for its medicinal properties, including anti-inflammatory and anti-bacterial effects. Garlic is a good source of vitamins, minerals, and antioxidants.",
            'price' => 1250000,
        ]);

        DB::table('items')->insert([
            'item_name' => "Shallot",
            'item_desc' => "Shallot is a small, delicate onion with a sweet and mild flavor. It is often used in sauces, dressings, and marinades, as well as in soups, stews, and stir-fries. Shallots are a good source of vitamins, minerals, and antioxidants, and are considered a healthier alternative to traditional onions.",
            'price' => 1500000,
        ]);
    }
}
