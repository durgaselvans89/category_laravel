<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id', 'sortorder', 'status'
    ];

    
    protected $casts = [
    	'sortorder' => 'integer',
		'status'	=> 'boolean',
		'parent_id'	=> 'integer',    	
    ];

    
	public function saveCategory($data)
	{
        $this->name = $data['name'];
        $this->parent_id = $data['parent_id'];
        $this->sortorder = $data['sortorder'];
        $this->status = $data['status'];
        $this->save();
        return 1;	
	}

	public function updateCategory($data, $id)
	{
        $category = $this->find($id);
        $category->name = $data['name'];
        $data['parent_id'] = $data['parent_id'];
        $category->parent_id = $data['parent_id'] ;
        $category->sortorder = $data['sortorder'];
        $category->status = $data['status'];
        $category->save();
        return 1;	
	}

	public function getAllCategories() {

		$categories = Category::where('id', '>=', 0)->paginate(10);
		foreach ($categories as $key => $value) {
			if($value['parent_id'] != null)
				$value['name'] = $this->getparentName($value['parent_id']).' > '.$value['name'];	
		}
		return $categories;
		
	}

	private function getparentName($value, $parent_name='') {
		$category = self::where('id',$value)->first();
		if( $parent_name == '')
			$parent_name = $category['name'];
		else
			$parent_name = $category['name'].' > '.$parent_name ;		
		if($category['parent_id'] != null) {
			return $this->getparentName($category['parent_id'], $parent_name);
		}
		else
			return $parent_name;
	}

	public function removeCategory($data) {
		if(is_array($data) && count($data) > 0) {
			$data = array_diff( $data, ['all']);
			$category = self::whereIn('parent_id',$data)->get();
			if(count($category) > 0 ) {
				return 0;
			}
			else
			{
				self::whereIn('id', $data)->delete();
				return 1;
			}	
		}
	}

	

    /*public function __construct() {
        $this->categories = Category::all()->keyBy('id');
    }*/

    public function getHierarchyList(): array
    {
        //$static = new static();
        
        //$topLevelCategories = $static->categories->filter(function ($category) {
    	$categories = Category::all()->keyBy('id');
    	$topLevelCategories = $categories->filter(function ($category) {
            return $category->parent_id <= 0;
        });

        return $this->getList($topLevelCategories);
    }

    protected function getList($categories, &$level = 0, &$list = [], $id=0) {
        foreach ($categories as $category) {
            if($level==0)
            	$list[$category->id] = $this->getHierarchyData($category, $level);
            elseif($level==1)
            	$list[$category->parent_id]['menu'][$category->id] = $this->getHierarchyData($category, $level);
            elseif($level==2)
            	$list[$id]['menu'][$category->parent_id]['submenu'][] = $this->getHierarchyData($category, $level);
            $childrenCategories = $this->getCategoryChildren($category->id);
            if (count($childrenCategories)) {
                $level++;
                $this->getList($childrenCategories, $level, $list, $category->parent_id);
                $level--;
            }
        }

        return $list;
    }

    protected function getHierarchyData($category, $level) {
        return [
            'id' => $category->id,
            'level' => $level,
            'name' => $category->name,
            'parent_id' => $category->parent_id,
        ];
    }

    protected function getCategoryChildren($categoryId) {
    	$categories = Category::all()->keyBy('id');
        return $categories->filter(function ($category) use ($categoryId) {
            return $category->parent_id == $categoryId;
        });
    }

}
