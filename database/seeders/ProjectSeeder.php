<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                "title" => "Titolo elemento 1",
                "type_id" => '3',
                "image_url" => "https://www.example.com/immagine1.jpg",
                "date" => "2024-02-12",
                "description" => "Descrizione dell'elemento 1"
            ],
            [
                "title" => "Titolo elemento 2",
                "type_id" => '2',
                "image_url" => "https://www.example.com/immagine2.jpg",
                "date" => "2024-02-13",
                "description" => "Descrizione dell'elemento 2"
            ],
            [
                "title" => "Titolo elemento 3",
                "type_id" => '1',
                "image_url" => "https://www.example.com/immagine2.jpg",
                "date" => "2024-02-13",
                "description" => "Descrizione dell'elemento 3"
            ],
            [
                "title" => "Titolo elemento 4",
                "type_id" => '2',
                "image_url" => "https://www.example.com/immagine2.jpg",
                "date" => "2024-02-13",
                "description" => "Descrizione dell'elemento 4"
            ],
            [
                "title" => "Titolo elemento 5",
                "type_id" => '3',
                "image_url" => "https://www.example.com/immagine2.jpg",
                "date" => "2024-02-13",
                "description" => "Descrizione dell'elemento 5"
            ],
            
        ];

        
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject-> title=$project['title'];
            $newProject-> type_id=$project['type_id'];
            $newProject-> image_url=$project['image_url'];
            $newProject-> date=$project['date'];
            $newProject-> description=$project['description'];
            $newProject->save();
        }
    }
}
