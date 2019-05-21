<?php
//app/Helpers/Envato/User.php
namespace App\Http\Helpers;
 
use App\Article;

class Filter {
    public static function filterTags($reqTag) {
        $tags = Article::select('tag')->distinct()->get();

        foreach($tags as $tag) {
            if($reqTag){
                if (in_array($tag->tag, $reqTag)) {
                    $tag['checked'] = 'checked';
                };
            }
        };

        return $tags;
    }
}