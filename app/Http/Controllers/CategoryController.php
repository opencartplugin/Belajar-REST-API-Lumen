<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepositoryEloquent;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryEloquent $cat)
    {
        $this->categoryRepository = $cat;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->categoryRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        return $this->categoryRepository->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->categoryRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //CATATAN PENTING :
    // UNTUK UPDATE DENGAN TYPE PUT,BODY BUKAN DI form-data TAPI DI x-www-form-urlencode
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '-');
        return $this->categoryRepository->update($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
