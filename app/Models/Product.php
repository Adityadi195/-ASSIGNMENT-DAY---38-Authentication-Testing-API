<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'is_active',
    ];

    protected $casts = [
        'price'     => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Relasi: Setiap product dimiliki oleh satu user (seller).
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi: Setiap product masuk dalam satu category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
