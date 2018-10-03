<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Category
 *
 * @author dell
 */
class Category  extends Model {
    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'seo', 'avathar'];
}
