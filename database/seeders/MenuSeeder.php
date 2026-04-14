<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            ['id' => 'm1', 'title' => 'Хумус классический', 'category' => 'Мезе', 'price' => 290, 'weight' => '160 г', 'kcal' => 320, 'description' => 'Нежный нут, тахини, оливковое масло, паприка.', 'ingredients' => 'нут, тахини, лимон, чеснок, специи'],
            ['id' => 'm2', 'title' => 'Бабагануш', 'category' => 'Мезе', 'price' => 310, 'weight' => '160 г', 'kcal' => 280, 'description' => 'Запечённый баклажан, тахини, дымный аромат.', 'ingredients' => 'баклажан, тахини, лимон, чеснок'],
            ['id' => 'm3', 'title' => 'Сигара бёрек', 'category' => 'Закуски', 'price' => 340, 'weight' => '6 шт', 'kcal' => 420, 'description' => 'Хрустящие рулетики из теста фило с сыром.', 'ingredients' => 'тесто фило, сыр, зелень'],
            ['id' => 's1', 'title' => 'Чечевичный суп (Mercimek)', 'category' => 'Супы', 'price' => 320, 'weight' => '300 мл', 'kcal' => 210, 'description' => 'Классика турецких супов — с лимоном и специями.', 'ingredients' => 'чечевица, овощи, специи'],
            ['id' => 's2', 'title' => 'Крем-суп из тыквы', 'category' => 'Супы', 'price' => 330, 'weight' => '300 мл', 'kcal' => 240, 'description' => 'Сливочный, мягкий, с семечками.', 'ingredients' => 'тыква, сливки, специи'],
            ['id' => 'g1', 'title' => 'Адана-кебаб', 'category' => 'Гриль', 'price' => 690, 'weight' => '220 г', 'kcal' => 540, 'description' => 'Рубленая баранина, угли, подача с лавашом.', 'ingredients' => 'баранина, специи, лаваш, соус'],
            ['id' => 'g2', 'title' => 'Люля из курицы', 'category' => 'Гриль', 'price' => 590, 'weight' => '220 г', 'kcal' => 460, 'description' => 'Сочный люля-кебаб из курицы с зеленью.', 'ingredients' => 'курица, зелень, специи, лаваш'],
            ['id' => 'g3', 'title' => 'Донер-тарелка', 'category' => 'Горячее', 'price' => 640, 'weight' => '320 г', 'kcal' => 610, 'description' => 'Донер, рис/булгур, салат, соусы.', 'ingredients' => 'мясо, овощи, рис/булгур, соусы'],
            ['id' => 'g4', 'title' => 'Искендер', 'category' => 'Горячее', 'price' => 720, 'weight' => '350 г', 'kcal' => 740, 'description' => 'Донер на лаваше с томатным соусом и йогуртом.', 'ingredients' => 'донер, лаваш, йогурт, томатный соус'],
            ['id' => 'b1', 'title' => 'Пиде с сыром', 'category' => 'Выпечка', 'price' => 520, 'weight' => '300 г', 'kcal' => 690, 'description' => 'Лодочка из теста с тягучим сыром.', 'ingredients' => 'тесто, сыр, масло'],
            ['id' => 'b2', 'title' => 'Лахмаджун', 'category' => 'Выпечка', 'price' => 390, 'weight' => '1 шт', 'kcal' => 410, 'description' => 'Тонкая лепёшка с пряным фаршем и зеленью.', 'ingredients' => 'тесто, фарш, томаты, зелень'],
            ['id' => 'd1', 'title' => 'Пахлава', 'category' => 'Десерты', 'price' => 280, 'weight' => '120 г', 'kcal' => 520, 'description' => 'Слоёная, медовая, с орехами.', 'ingredients' => 'тесто, мёд, орехи, масло'],
            ['id' => 'd2', 'title' => 'Кюнефе', 'category' => 'Десерты', 'price' => 420, 'weight' => '180 г', 'kcal' => 610, 'description' => 'Тёплый десерт с сыром и сиропом.', 'ingredients' => 'кадаиф, сыр, сироп'],
            ['id' => 'p1', 'title' => 'Айран', 'category' => 'Напитки', 'price' => 160, 'weight' => '300 мл', 'kcal' => 90, 'description' => 'Освежающий кисломолочный напиток.', 'ingredients' => 'йогурт, вода, соль'],
            ['id' => 'p2', 'title' => 'Чай турецкий', 'category' => 'Напитки', 'price' => 140, 'weight' => '250 мл', 'kcal' => 0, 'description' => 'Крепкий чёрный чай по-турецки.', 'ingredients' => 'чай'],
        ];

        $images = [
            'm1' => 'images/dishes/хумус.png',
            'm2' => 'images/dishes/бабагануш.jfif',
            'm3' => 'images/dishes/Сигара бёрек.jfif',
            's1' => 'images/dishes/Чечевичный суп (Mercimek).jfif',
            's2' => 'images/dishes/Крем-суп из тыквы.jfif',
            'g1' => 'images/dishes/Адана-кебаб.jfif',
            'g2' => 'images/dishes/Люля из курицы.jfif',
            'g3' => 'images/dishes/Донер-тарелка.jfif',
            'g4' => 'images/dishes/Искендер-кебаб.jfif',
            'b1' => 'images/dishes/Пиде с сыром.jfif',
            'b2' => 'images/dishes/Лахмаджун.jfif',
            'd1' => 'images/dishes/Пахлава.jfif',
            'd2' => 'images/dishes/Кюнефе.jfif',
            'p1' => 'images/dishes/Айран.jfif',
            'p2' => 'images/dishes/Турецкий чай.jfif',
        ];

        DB::transaction(function () use ($menu, $images) {
            $titles = collect($menu)->pluck('category')->unique()->values();

            /** @var array<string,int> $categoryIdByTitle */
            $categoryIdByTitle = [];
            foreach ($titles as $title) {
                $cat = MenuCategory::query()->firstOrCreate(
                    ['title' => $title],
                    ['is_active' => true]
                );
                $categoryIdByTitle[$title] = $cat->id;
            }

            foreach ($menu as $row) {
                $categoryId = $categoryIdByTitle[$row['category']];

                MenuItem::query()->updateOrCreate(
                    ['title' => $row['title'], 'category_id' => $categoryId],
                    [
                        'description' => $row['description'],
                        'weight' => $row['weight'],
                        'price' => $row['price'],
                        'ingredients' => $row['ingredients'],
                        'kcal' => $row['kcal'],
                        'image' => $images[$row['id']] ?? null,
                        'is_available' => true,
                    ]
                );
            }
        });
    }
}
