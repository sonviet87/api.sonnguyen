<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductController extends RestfulController
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;

    }

    /**
     * Get all approved products with paginate
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->input("per_page", 20);
            $product = $this->productService->getListPaginate($perPage);
            $product->appends($request->except(['page', '_token']));
            $paginator = $this->getPaginator($product);
            $pagingArr = $product->toArray();
            return $this->_response([
                'pagination' => $paginator,
                'products' => $pagingArr['data']
            ]);
        } catch (\Exception $e) {
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }


    /**
     * Create a product
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required',
            'code' => 'bail|required',
            'unit_id' => 'bail|required|exists:units,id',
            'suplier_id' => 'bail|required|exists:supliers,id',
            'user_id' => 'bail|required|exists:users,id',
        ]);
        try {
            $data = $request->all();
            $result = $this->productService->createNewProduct($data);
            if ($result['status'] == false) {
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        } catch (\Exception $e) {
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Get a product by id
     * @param interger $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $result = $this->productService->getProductByID($id);
            if ($result['status'] == false) {
                return $this->_error($result['message']);
            }
            return $this->_response($result['data']);
        } catch (\Exception $e) {
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Update a product by product id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required'
        ]);
        try {
            $data = $request->all();
            $result = $this->productService->updateProductByID($id, $data);
            if ($result['status'] == false) {
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        } catch (\Exception $e) {
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

    /**
     * Delete a list of product by an array of product id
     * @param array $ids
     * @return mixed
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'ids' => 'required|array|min:1',
        ]);
        try {
            $ids = $request->input('ids');
            $result = $this->productService->destroyProductsByIDs($ids);
            if ($result['status'] == false) {
                return $this->_error($result['message']);
            }
            return $this->_success($result['message']);
        } catch (\Exception $e) {
            return $this->_error($e, self::HTTP_INTERNAL_ERROR);
        }
    }

}
