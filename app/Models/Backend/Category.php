<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Traits\Attribute\RoleAttribute;
use App\Models\Backend\Traits\Attribute\CategoryAttribute;

/**
 * Description of Category
 *
 * @author dell
 */
class Category  extends Model {
    use CategoryAttribute;
    
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
    protected $fillable = ['name', 'description', 'seo', 'avathar', 'user_id'];
}
