<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Arr;

class Job extends Model {

        use HasFactory;

//    public static function all() : array 
//    {
    //  old way/basic way
    //    return [
    //        [
    //            'id' => 1,
    //            'title' => 'Director',
    //            'salary' => '$50,000'
    //        ],
    //        [
    //            'id' => 2,
    //            'title' => 'Programmer',
    //            'salary' => '$10,000'
    //        ],
    //        [
    //            'id' => 3,
    //            'title' => 'Teacher',
    //            'salary' => '$40,000'
    //        ]
    //    ];    
    //    }
    
    
//     public static function find(int $id) : array 
//    {
//         $job =  Arr::first(static::all(), fn($job) => $job['id'] == $id);

//         if(! $job){
//             abort(404);
//         }else{
//             return $job;
//         }
//    }

   //using eloquent
   protected $table = 'job_listings';

//    protected $fillable = ['title','salary','employer_id']; //this is to allow fields to be massassigned 
     protected $guarded = []; //list of fields not to be massassigned

   public function employer() //defining the function to access object of the employer to get the employer details using job
   {
        return $this->belongsTo(Employer::class);
   }

   public function tags()
   {
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id');
   }
}


?>