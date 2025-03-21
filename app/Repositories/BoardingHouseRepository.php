<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
	public function getAllBoardingHouses($search = null, $city = null, $category = null)
	{
		// Implement the method logic here

        $query = BoardingHouse::query();

        // Apply filters
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Apply filters to City
        if ($city){
            $query->whereHas('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        // Apply filters to Category
        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }

        return $query->get();
	}

    public function getPopularBoardingHouses($limit = 5)
	{
		// Implement the method logic here
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
	}

    public function getBoardingHouseByCitySlug($slug)
	{
		// Implement the method logic here

        return BoardingHouse::whereHas('city', function (Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->get();
	}

	public function getBoardingHouseByCategorySlug($slug)
	{
		// Implement the method logic here
        return BoardingHouse::whereHas('category', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
	}

	public function getBoardingHouseBySlug($slug)
	{
		// Implement the method logic here

        return BoardingHouse::where('slug', $slug)->first();
	}

    public function getBoardingHouseRoomById($id)
    {
        return Room::find($id);
    }

}