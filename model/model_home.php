<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_home extends Eloquent {

    protected $table="post";

    public function tr(){
         return DB::table('post')->where('approve',1)->get();
        // return DB::table('post')->where('categury', 0)->first();
        // return DB::table('post')->where('categury', 1)->value('tags');
        // return DB::table('post')->pluck('tags');
        /*return DB::table('post')->orderBy('id')->chunk(100, function ($users) {
    		foreach ($users as $user) {
        		echo $user->title."<br>";
    		}
		});*/
		// return DB::table('post')->count();
		// return DB::table('post')->max('categury');
		// return DB::table('post')->where('id', 1)->avg('categury');
		// return DB::table('post')->select('title', 'tags as user_tags')->get();
		// return DB::table('post')->distinct()->get();
		/*$query = DB::table('post')->select('title');
		return $query->addSelect('categury')->get();*/
		/*return DB::table('post')
                     ->select(DB::raw('count(*) as user_count, categury'))
                     ->where('categury', '>=', 0)
                     ->groupBy('categury')
                     ->get();*/
         /*return DB::table('post')
                ->selectRaw('categury * ? as price_with_tax', [2])
                ->get(); ====>  nafahmidamesh   */
    }

}