<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * 
 * @property int $id
 * @property string $name
 * @property int $size
 * @property string $original_name
 * @property string $path
 * @property string $extension
 * @property Carbon|null $created_at
 * 
 * @property Collection|ProductImage[] $productImages
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'size' => 'int'
	];

	protected $fillable = [
		'name',
		'size',
		'original_name',
		'path',
		'extension'
	];

	public function productImages()
	{
		return $this->hasMany(ProductImage::class);
	}
}
