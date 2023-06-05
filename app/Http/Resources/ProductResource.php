<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Model\Image;
use App\Models\Model\Category;
use App\Models\Model\Tag;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //get images if not null
        $relatedImages = [];
        if($this->images) {
            $images = json_decode($this->images);
            foreach($images as $image) {
                $image = Image::find($image);
                array_push($relatedImages, $image);
            }
        }

        /* //get categories if not null
        $relatedCategories = [];
        if($this->categories != []) {
            $categories = json_decode($this->categories);
            foreach($categories as $category) {
                $category = Category::find($category);
                array_push($relatedCategories, $category->name);
            }
        }

        //get tags if not null
        $relatedTags = [];
        if($this->tags != []) {
            $tags = json_decode($this->tags);
            foreach($tags as $tag) {
                $tag = Tag::find($tag);
                array_push($relatedTags, $tag->name);
            }
        } */


        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'images' => $relatedImages,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            /* 'categories' => $relatedCategories,
            'tags' => $relatedTags, */
            'featured' => $this->featured,
            'quantity' => $this->quantity,
            'sku' => $this->sku,
            'ean' => $this->ean,
            'sale_price' => $this->sale_price,
            'sale_price_dates_from' => $this->sale_price_dates_from,
            'sale_price_dates_to' => $this->sale_price_dates_to,
            'tax_percentage' => $this->tax_percentage,
            'status' => $this->status,
            'total_sells' => $this->total_sells,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
