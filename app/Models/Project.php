<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'client_name',
        'summary',
        'cover_image',
        'cover_image_original_name',
        'type_id'
     ];

    // type al singolare perche essendo una relazione uno a molti ogni project può avere un solo type
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // relazione many to many
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    // funzione per generare lo slug e se esiste gia modificarlo tramite contatore
    public static function generateSlug($string){
        $slug = Str::slug($string, '-');

        $original_slug = $slug;
        $c = 1;
        $exists = Project::where('slug',$slug)->first();
        while($exists){
            $slug = $original_slug . '-' . $c;
            $exists = Project::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }
}