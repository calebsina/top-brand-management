<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
     /**
     * @group Brands
     * Get top brands for a user's country
     *
     * Fetches the top list of brands using the CF-IPCountry header. If no brands match the country,
     * it returns "FRANCE(FR)" as default list.
     *
     * @header CF-IPCountry US
     * @response 200 scenario="Success" [
     *   {
     *     "brand_id": 1,
     *     "brand_name": "Nike",
     *     "brand_image": "https://test.com/nike.png",
     *     "rating": 5,
     *     "country_code": "US"
     *   }
     * ]
     */
    public function index(Request $request)
    {
        // dd($request);

        // fetch header and get the country code if absent return nuFR as default
        $country = $request->header('CF-IPCountry') ?? 'FR';

        //filter based on country_code
        $brands = Brand::where('country_code', $country)
            ->orWhere('country_code', 'DEFAULT')
            ->orderByDesc('rating')
            ->get();


        return response()->json($brands);
    }

  /**
     * @group Brands
     * Create a new brand
     *
     * Adds a brand to the toplist with optional country scoping.
     *
     * @bodyParam brand_name string required The name of the brand. Example: Adidas
     * @bodyParam brand_image string required A valid URL to the brand logo. Example: https://test.com/adidas.png
     * @bodyParam rating integer required Rating from 1 to 5. Example: 4
     * @bodyParam country_code string Optional ISO-2 country code. Example: US
     */

    public function store(Request $request)
    {
        // dd($request);
        // validate request
        $validated = $request->validate([
            'brand_name' => 'required|string',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
            'country_code' => 'nullable|string|size:2'
        ]);

        $brand = Brand::create($validated);
        // dd($brand);

        return response()->json($brand, 200); 
    }

   /**
     * @group Brands
     * Get a specific brand
     *
     * @urlParam brand_id integer required The ID of the brand. Example: 2
     * @response 200 {
     *   "brand_id": 2,
     *   "brand_name": "Puma",
     *   "brand_image": "https://example.com/puma.png",
     *   "rating": 4,
     *   "country_code": "US"
     * }
     */
    public function show(Brand $brand)
    {
        return $brand;
    }


   /**
     * @group Brands
     * Update a brand
     *
     * Update brand info partially or fully.
     *
     * @urlParam brand_id integer required The ID of the brand to update. Example: 3
     * @bodyParam brand_name string The name of the brand.
     * @bodyParam brand_image string A valid image URL.
     * @bodyParam rating integer Rating from 1 to 5.
     * @bodyParam country_code string Optional ISO-2 country code.
     */
    public function update(Request $request, Brand $brand)
    {
        // dd($request);
        $validated = $request->validate([
            'brand_name' => 'sometimes|required|string',
            'brand_image' => 'sometimes|required|url',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'country_code' => 'nullable|string|size:2'
        ]);
        // dd($validated);


        $brand->update($validated);
        return $brand;
    }

  /**
     * @group Brands
     * Delete a brand
     *
     * @urlParam brand_id integer required The ID of the brand to delete. Example: 5
     * @response 200 {
     *   "message": "Deleted successfully"
     * }
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
