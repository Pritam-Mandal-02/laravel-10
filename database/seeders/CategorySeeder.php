<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Food',
                'description' => 'Ut aute sit enim enim est. Officia minim commodo amet aute dolore. Deserunt non enim laborum tempor qui quis ea Lorem eiusmod amet anim id. Cupidatat eu ipsum aute aliquip ad consequat incididunt occaecat.',
            ], [
                'name' => 'Cloths',
                'description' => 'Consectetur irure aliquip veniam voluptate voluptate Lorem culpa fugiat. Incididunt qui sint minim enim laborum in consectetur cupidatat commodo do cillum sunt. Veniam dolore nostrud tempor adipisicing do anim excepteur laboris minim amet quis. Cillum laborum qui tempor in. Lorem labore ut minim culpa. Non do ut sit reprehenderit proident qui. Dolor laboris ex Lorem consectetur amet et id ex sunt fugiat sint non.',
            ], [
                'name' => 'Electronics',
                'description' => 'Voluptate amet aliquip duis nostrud eu quis ea eu do anim. Est ad labore qui consectetur ad quis sunt voluptate cupidatat. Aute fugiat mollit cillum commodo proident Lorem excepteur. Fugiat elit do velit consequat sunt pariatur dolor esse quis non qui tempor sunt magna. Aute deserunt Lorem elit in reprehenderit do in minim sunt do ex est.',
            ], [
                'name' => 'Other',
                'description' => 'Culpa nisi esse fugiat occaecat proident aute sunt mollit reprehenderit nisi officia. Pariatur culpa enim nisi duis sit esse esse eiusmod laborum ipsum eiusmod. Lorem sint ex cupidatat eiusmod anim culpa consectetur cillum laboris aute voluptate. Eiusmod aliquip incididunt proident et aliqua laboris eu eu dolor. Et et est irure Lorem eu exercitation reprehenderit officia voluptate sint magna dolore id non.',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
