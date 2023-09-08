<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleHasCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentData extends Seeder
{
    const DATAPATH = "public/csvData/";      // Path in which the data are included

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->insert_articlecategories(self::DATAPATH."articlecategory.csv");
        $this->insert_user(self::DATAPATH."user.csv");
        $this->insert_articles(self::DATAPATH."articles.csv");
        $this->insert_article_has_articlecategories(self::DATAPATH."article_has_articlecategory.csv");
        //TODO: START SEED!!!!!
    }

    /***Helper methods to seed data***/
    private function insert_articlecategories($file){
        $stream = fopen($file,'r');
        fgetcsv($stream);     // Ignore first line

        while (!feof($stream)){
            $line = fgetcsv($stream, null,';');
            if (!is_array($line))       // if current line is blank -> next line
                continue;

            /*for ($i = 0;$i < sizeof($line);$i++){
                if ($line[$i] == 'NULL'){
                    $line[$i] = null;
                }
            }*/

            DB::table('ab_articlecategory')->insert([
                'ab_name' => $line[1],
                'ab_parent' => ($line[2] == 'NULL' ? null : $line[2])
            ]);
        }

        fclose($stream);

    }
    private function insert_user($file){
        $stream = fopen($file,'r');
        fgetcsv($stream);     // Ignore first line

        while (!feof($stream)){
            $line = fgetcsv($stream, null,';');
            if (!is_array($line))       // if current line is blank -> next line
                continue;

            DB::table('ab_user')->insert([
                'ab_name' => $line[1],
                'ab_password' => $line[2],
                'ab_mail' => $line[3]
            ]);
        }
        fclose($stream);
    }
    private function insert_articles($file){
        $stream = fopen($file,'r');
        fgetcsv($stream);     // Ignore first line


        while (!feof($stream)){
            $line = fgetcsv($stream, null,';');
            $price = ($line[2] == 'NULL' ? null : $line[2]);
            $date = ($line[5] == 'NULL' ? null : $line[5]);

            DB::table('ab_article')->insert([
                'ab_name' => $line[1],
                'ab_price' => str_replace(".","",$price),
                'ab_description' => $line[3],
                'ab_creator_id' => $line[4],
                'ab_createdate' => date("Y-m-d h:m:s", strtotime($date))
            ]);
            /*
            $ab_article = new Article();
            $ab_article->ab_name = $line[1];
            $ab_article->ab_price = ((int)str_replace('.','',$line[2]))*100;   // Euro -> Cent
            $ab_article->ab_description = $line[3];
            $ab_article->ab_creator_id = $line[4];
            $ab_article->ab_createdate = $line[5];
            $ab_article->save();
            */
        }
        fclose($stream);
    }

    private function insert_article_has_articlecategories($file){
        $stream = fopen($file,'r');
        fgetcsv($stream);       // Ignore first line
        while (!feof($stream)){
            $line = fgetcsv($stream,null,';');

            DB::table('ab_article_has_articlecategory')->insert([
                'ab_articlecategory_id' => $line[0],
                'ab_article_id' => $line[1]
            ]);
            /*
            $ab_article_has_category = new ArticleHasCategory();
            $ab_article_has_category->ab_article_id = $line[1];
            $ab_article_has_category->ab_articlecategory_id = $line[0];
            $ab_article_has_category->save();
            */
        }
        fclose($stream);
    }
}
